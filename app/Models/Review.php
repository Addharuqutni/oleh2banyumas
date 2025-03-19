<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'email',
        'rating',
        'comment',
        'is_approved',
    ];

    /**
     * Get the shop that owns the review.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
