<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cart extends Authenticatable
{
    use Notifiable;

    protected $table = 'cart';

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(CartItems::class, 'cart_items');
    }
}
