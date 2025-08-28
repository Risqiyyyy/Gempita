<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection, WithHeadings
{
    protected $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function collection()
    {
        $posts = Post::with('kategori', 'tags')
            ->get();

        return $posts->map(function ($post) {
            $data = [];

            foreach ($this->columns as $column) {
                if ($column === 'categories') {
                    $data[] = $post->kategori->nama_kategori ?? '';
                } elseif ($column === 'tags') {
                    $data[] = $post->tags->pluck('nama_tags')->join(', ');
                } else {
                    $data[] = $post->$column ?? '';
                }
            }

            return $data;
        });
    }

    public function headings(): array
    {
        return array_map(function ($column) {
            return ucfirst(str_replace('_', ' ', $column));
        }, $this->columns);
    }
}