<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address', 
        'user_agent', 
        'page_visited', 
        'shop_id', 
        'referrer',
        'device_type',
        'browser'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
