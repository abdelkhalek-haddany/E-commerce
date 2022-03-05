<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    
    protected $table = 'order_items';

    protected $guarded = [];
    
    public function order()
{
    return $this->hasOne(Order::class, 'id');
}
}
