<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
        'slug', // Ensure slug is included for mass assignment
    ];

    /**
     * Get the shop that owns the product.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the categories for the product.
     */
    public function categories()
{
    return $this->belongsToMany(Category::class, 'product_categories');
}

    /**
     * Override the default route key binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug'; // Use 'slug' for route model binding
    }
}
