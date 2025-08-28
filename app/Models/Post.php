<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title', 'content', 'gambar', 'short_description', 
        'image_caption', 'slug', 'status', 'headline', 
        'start_date', 'start_time', 'keyword', 'sub_category_id',
        'description', 'kategori_id', 'user_id','created_at','adult','reporter_id','multipages','seo'
    ];
    

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->useDisk('public');
    }

    public function kategori()
    {
        return $this->belongsTo(Categori::class, 'kategori_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tags_id');
    }

    public function reporter()
    {
        return $this->belongsTo(Reporter::class, 'reporter_id');
    }

}
