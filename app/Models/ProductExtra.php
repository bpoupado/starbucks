<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class ProductExtra extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'stock', 'price', 'category_id'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
