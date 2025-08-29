<?php

namespace UniSharp\LaravelFilemanager\Controllers;

use Illuminate\Support\Facades\Storage;
use UniSharp\LaravelFilemanager\Events\FileIsMoving;
use UniSharp\LaravelFilemanager\Events\FileWasMoving;
use UniSharp\LaravelFilemanager\Events\FolderIsMoving;
use UniSharp\LaravelFilemanager\Events\FolderWasMoving;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use FilesystemIterator;
use \App\Models\ImageMetadata;
use Illuminate\Support\Collection;


class ItemsController extends LfmController
{
    /**
     * Get the images to load for a selected folder.
     *
     * @return mixed
     */

    public function getItems(Request $request)
    {
        $currentPage = self::getCurrentPageFromRequest();
        $perPage = $this->helper->getPaginationPerPage();
        $search = $request->input('search_query');
        $searchLower = mb_strtolower(trim($search));

        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

        $query = ImageMetadata::query();

        if (!empty($searchLower)) {
            $isDateSearch = preg_match('/^\d{1,2}(-\d{1,2})?(-\d{4})?$/', $searchLower) || preg_match('/^\d{4}$/', $searchLower);

            $query->where(function ($q) use ($searchLower, $isDateSearch) {
                $q->whereRaw("LOWER(REPLACE(REPLACE(filename, '-', ' '), '_', ' ')) LIKE ?", ['%' . $searchLower . '%'])
                ->orWhereRaw("LOWER(filename) LIKE ?", ['%' . $searchLower . '%']);

                if ($isDateSearch) {
                    $dateParts = explode('-', $searchLower);
                    $q->orWhere(function ($sub) use ($dateParts) {
                        if (count($dateParts) === 3) {
                            $sub->whereRaw('EXTRACT(DAY FROM created_at) = ?', [$dateParts[0]])
                                ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$dateParts[1]])
                                ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$dateParts[2]]);
                        } elseif (count($dateParts) === 2) {
                            $sub->whereRaw('EXTRACT(DAY FROM created_at) = ?', [$dateParts[0]])
                                ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$dateParts[1]]);
                        } elseif (strlen($dateParts[0]) === 4) {
                            $sub->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$dateParts[0]]);
                        } else {
                            $sub->whereRaw('EXTRACT(DAY FROM created_at) = ?', [$dateParts[0]]);
                        }
                    });
                }
            });
        }

        $totalFound = $query->count();

        $metadataList = $query->select(['filename', 'comp_url', 'thumb_url', 'created_at'])
                            ->orderByDesc('created_at')
                            ->forPage($currentPage, $perPage)
                            ->get();

        $items = $metadataList->map(function ($metadata) use ($imageExtensions) {
            $extension = strtolower(pathinfo($metadata->filename, PATHINFO_EXTENSION));
            $isImage = in_array($extension, $imageExtensions);
            $icon = $isImage ? 'fa-image' : 'fa-file';

            return (object)[
                'name' => $metadata->filename,
                'path' => null,
                'url' => $metadata->comp_url,
                'time' => strtotime($metadata->created_at),
                'icon' => $icon,
                'is_file' => true,
                'is_image' => $isImage,
                'thumb_url' => $metadata->thumb_url,
            ];
        });

        return response()->json([
            'items' => $items,
            'paginator' => [
                'current_page' => $currentPage,
                'total' => $totalFound,
                'per_page' => $perPage,
                'last_page' => ceil($totalFound / $perPage),
            ],
            'display' => $this->helper->getDisplayMode(),
            'working_dir' => '/shares',
        ]);
    }

    public function move()
    {
        $items = request('items');
        $folder_types = array_filter(['user', 'share'], function ($type) {
            return $this->helper->allowFolderType($type);
        });
        return view('laravel-filemanager::move')
            ->with([
                'root_folders' => array_map(function ($type) use ($folder_types) {
                    $path = $this->lfm->dir($this->helper->getRootFolder($type));

                    return (object) [
                        'name' => trans('laravel-filemanager::lfm.title-' . $type),
                        'url' => $path->path('working_dir'),
                        'children' => $path->folders(),
                        'has_next' => ! ($type == end($folder_types)),
                    ];
                }, $folder_types),
            ])
            ->with('items', $items);
    }

    public function doMove()
    {
        $target = $this->helper->input('goToFolder');
        $items = $this->helper->input('items');

        foreach ($items as $item) {
            $old_file = $this->lfm->pretty($item);
            $is_directory = $old_file->isDirectory();

            $file = $this->lfm->setName($item);

            if (!Storage::disk($this->helper->config('disk'))->exists($file->path('storage'))) {
                abort(404);
            }

            $old_path = $old_file->path();

            if ($old_file->hasThumb()) {
                $new_file = $this->lfm->setName($item)->thumb()->dir($target);
                if ($is_directory) {
                    event(new FolderIsMoving($old_file->path(), $new_file->path()));
                } else {
                    event(new FileIsMoving($old_file->path(), $new_file->path()));
                }
                $this->lfm->setName($item)->thumb()->move($new_file);
            }
            $new_file = $this->lfm->setName($item)->dir($target);
            $this->lfm->setName($item)->move($new_file);
            if ($is_directory) {
                event(new FolderWasMoving($old_path, $new_file->path()));
            } else {
                event(new FileWasMoving($old_path, $new_file->path()));
            }
        };

        return parent::$success_response;
    }

    private static function getCurrentPageFromRequest()
    {
        $currentPage = (int) request()->get('page', 1);
        $currentPage = $currentPage < 1 ? 1 : $currentPage;

        return $currentPage;
    }
}
