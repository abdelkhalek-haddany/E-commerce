<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoAuthCartItem extends Model
{
    use HasFactory;
    protected $table ="no_auth_cart_items";
    protected $guarded = [];

public function product()
{
    return $this->belongsToMany(Product::class, 'product_id');
}
}