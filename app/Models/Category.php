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
        return $this->hasMany(Product::class);
    }

    // Get shops that have products in this category
    public function shops()
    {
        return $this->hasManyThrough(
            Shop::class,
            Product::class,
            'category_id', // Foreign key on products table
            'id', // Foreign key on shops table
            'id', // Local key on categories table
            'shop_id' // Local key on products table
        );
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
