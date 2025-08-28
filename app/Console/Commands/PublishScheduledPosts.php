<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;

class PublishScheduledPosts extends Command
{
    protected $signature = 'posts:update-status';
    protected $description = 'Update the status of posts scheduled to be published';

    public function handle()
    {
        $currentDateTime = Carbon::now('Asia/Jakarta');
        $this->info($currentDateTime);
        $currentDate = $currentDateTime->format('Y-m-d');
        $currentTime = $currentDateTime->format('H:i:s');
    
        $posts = Post::where('status', 'schedule')
            ->where(function($query) use ($currentDate, $currentTime) {
                $query->where(function($query) use ($currentDate, $currentTime) {
                    $query->where('start_date', '=', $currentDate)
                          ->where('start_time', '<=', $currentTime);
                })
                ->orWhere('start_date', '<', $currentDate);
            })
            ->get();
    
        foreach ($posts as $post) {
            $scheduledDateTime = Carbon::parse($post->start_date . ' ' . $post->start_time, 'Asia/Jakarta');

            $post->timestamps = false;

            $post->status = 'publish';
            $post->created_at = $scheduledDateTime;

            $post->save();
            
            $post->timestamps = true;

            $this->info("Updated post ID {$post->id} to public with created_at set to {$scheduledDateTime}");
        }
    
        $this->info('Post status update complete');
    }
}
