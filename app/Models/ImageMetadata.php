<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMetadata extends Model
{
    use HasFactory;
    protected $fillable = [
        'original_name',
        'filename',
        'url',
        'thumb_url',
        'comp_url',
        'caption',
    ];
}
