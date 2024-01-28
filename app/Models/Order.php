<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'seller_id',
        'quantity',
        'total_price',
        'address',
        'status',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function seller() 
    {
        return $this->belongsTo(User::class);
    }
    public function product() 
    {
        return $this->belongsTo(Product::class);
    }
}
