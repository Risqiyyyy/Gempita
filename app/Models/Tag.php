<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nama_tags', 'slug'];
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tags_id', 'post_id');
    }
}

