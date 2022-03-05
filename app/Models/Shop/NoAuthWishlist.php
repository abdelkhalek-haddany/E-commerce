<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoAuthWishlist extends Model
{
    use HasFactory;
    protected $table ='no_auth_wishlist';
    protected $guarded = [];
}
