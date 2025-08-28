<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['nama_sub_kategori', 'categori_id','slug'];

    public function category()
    {
        return $this->belongsTo(Categori::class, 'category_id');
    }
}
