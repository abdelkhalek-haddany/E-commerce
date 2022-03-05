<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];

public function user()
{
    return $this->belongsToMany(User::class, 'user_id');
}

public function product()
{
    return $this->belongsToMany(Products::class, 'product_id');
}
public function category()
{
    return $this->belongsToMany(Category::class, 'category_id');
}
public function items()
    {
        return $this->belongsToMany(OrderItems::class, 'order_items');
    }
}