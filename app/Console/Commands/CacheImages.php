<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use UniSharp\LaravelFilemanager\Controllers\LfmController;
use UniSharp\LaravelFilemanager\Lfm;
use UniSharp\LaravelFilemanager\LfmPath;
use Illuminate\Support\Facades\Storage;
use UniSharp\LaravelFilemanager\Events\FileIsMoving;
use UniSharp\LaravelFilemanager\Events\FileWasMoving;
use UniSharp\LaravelFilemanager\Events\FolderIsMoving;
use UniSharp\LaravelFilemanager\Events\FolderWasMoving;


class CacheImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cache-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lfm = new LfmPath('public');
        print_r($lfm->getRootFolder());
        exit;
        $folders = $lfm->folders();
        $files = $lfm->files();
        
        $items = array_merge($folders, $files);

        foreach ($items as $item) {
            $this->line($item['name']);
        }

        return 0;

        // $file = Storage::disk('public')->allFiles();
        // print_r($file);
        // exit;
        // $value = Cache::store('file')->get('lfmimages');
        // if(empty($value)){
        //     print("cache kosong");
            
        //     $value = $items = array_merge($this->lfm->folders(), $this->lfm->files());
        //     Cache::store('file')->put('lfmimages',$value,$second = 3600);
        // }
    }
}
