<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    protected $table = 'categories';

    protected $fillable = ['nama_kategori', 'slug','created_at'];
    use HasFactory;

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
}
