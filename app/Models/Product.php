<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Product extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'id_category',
        'deskripsi',
        'gambar',
    ];

    public function category()
    {
        // return $this->belongsTo(ProductCategory::class)->withPivot('id_category', 'id');
        return $this->hasOne(ProductCategory::class, 'id', 'id_category');
    }
}
