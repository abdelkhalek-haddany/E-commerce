<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoAuthCart extends Model
{
    use HasFactory;
    protected $table="no_auth_cart";
    protected $guarded=[];

    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_items');
    }
}
