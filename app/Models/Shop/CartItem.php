<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    
    protected $table="cart_items";
    protected $guarded=[];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_id');
    }

    // public function items()
    // {
    //     return $this->hasMany(CartItem::class, 'cart_items');
    // }
}
