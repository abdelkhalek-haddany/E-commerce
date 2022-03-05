<?php

use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use App\Models\Shop\Category;
use App\Models\Shop\Language;
use App\Models\Shop\NoAuthCart;
use App\Models\Shop\NoAuthCartItem;
use App\Models\Shop\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;


$filter_product="";
function get_languages(){

    return Language::active() -> Selection() -> get();
}

function get_default_lang(){
  return   Config::get('app.locale');
}


function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}



function uploadVideo($folder, $video)
{
    $video->store('/', $folder);
    $filename = $video->hashName();
    $path = 'video/' . $folder . '/' . $filename;
    return $path;
}

function cartItemsCount()
{
if(Auth::check()){
    $cartItemsCount= CartItem::where('user_id',Auth::id())->count();
}else{
    $token = Cookie::get('token') ? Cookie::get('token') : csrf_token();
    $cartItemsCount= CartItem::where('token',$token)->count();
}
return $cartItemsCount;
}

function categories()
{
    $categories=Category::where('is_published','1')->get();
    return $categories;
}
function category($id){
    $category=Category::where('id',$id)->get()->first();
    return $category;
}
function getProduct($id)
{
    $product=Product::where('id',$id)->get()->first();
    return $product;
}

function user($id)
{
    $user= User::where('id',$id)->get()->first();
    return $user;
}