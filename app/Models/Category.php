<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    /**
     * Get shops that have products in this category.
     */
    public function shops()
    {
        return Shop::whereHas('products', function($query) {
            $query->whereHas('categories', function($q) {
                $q->where('categories.id', $this->id);
            });
        });
    }
}
