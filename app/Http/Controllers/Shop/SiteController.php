<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function contact(){
        return view('shop/pages/contact');
    }
    public function about(){
        return view('shop/pages/about');
    }
    public function profile(){
        return view('shop/pages/profile');
    }
    public function settings(){
        return view('shop/pages/settings');
    }
}