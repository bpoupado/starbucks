<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\ProductCategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'stock', 'price', 'category_id'
    ];

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
