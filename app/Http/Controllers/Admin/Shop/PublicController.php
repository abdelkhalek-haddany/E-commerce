<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function orders(){
        return view('admin.orders.index');
    }
    public function livreurs(){
        return view('admin.livreurs.index');
    }
}