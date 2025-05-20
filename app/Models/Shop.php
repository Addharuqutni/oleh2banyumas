<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'description',
        'phone',
        'email',
        'operating_hours',
        'featured_image',
        'status',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($shop) {
            if (empty($shop->slug)) {
                $shop->slug = Str::slug($shop->name);

                // Ensure slug is unique
                $count = 2;
                $originalSlug = $shop->slug;
                while (static::where('slug', $shop->slug)->exists()) {
                    $shop->slug = $originalSlug . '-' . $count++;
                }
            }
        });

        static::updating(function ($shop) {
            if ($shop->isDirty('name') && !$shop->isDirty('slug')) {
                $shop->slug = Str::slug($shop->name);

                // Ensure slug is unique
                $count = 2;
                $originalSlug = $shop->slug;
                while (static::where('slug', $shop->slug)->where('id', '!=', $shop->id)->exists()) {
                    $shop->slug = $originalSlug . '-' . $count++;
                }
            }
        });
    }

    /**
     * Get the products for the shop.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the images for the shop.
     */
    public function images()
    {
        return $this->hasMany(ShopImage::class);
    }

    /**
     * Get the reviews for the shop.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the average rating for the shop.
     */
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->where('is_approved', true)->avg('rating') ?? 0;
    }

    public function visitorLogs()
    {
        return $this->hasMany(VisitorLog::class);
    }

    /**
     * Get all categories associated with this shop's products.
     */
    public function getCategoriesAttribute()
    {
        return Category::whereHas('products', function($query) {
            $query->where('shop_id', $this->id);
        })->get();
    }
}
