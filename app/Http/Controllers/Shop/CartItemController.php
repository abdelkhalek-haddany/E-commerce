<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\CartItem;
use App\Models\Shop\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{
public function store(Request $request){
    // $product = Product::find($request->id);
    if(Auth::check()){
        CartItem::create([
            'product_id' => $request->id,
            'user_id' => Auth::id(),
            'color' => $request->color,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'token' => csrf_token(),
        ]);
    }else{
        $token = Cookie::get('token') ? Cookie::get('token') : csrf_token();
        CartItem::create([
            'product_id' => $request->id,
            'token' => $token,
            'color' => $request->color,
            'size' => $request->size,
            'quantity' => $request->quantity,
        ]);
        Cookie::queue('token', $token , 86400*30);
     }
    return redirect()->route('shopping-cart');
}
public function destroy($id)
    {
        if(Auth::check()){
            DB::delete('delete from cart_items where id = ? and user_id = ?', [$id,Auth::id()]);
        }else{
            $token = Cookie::get('token');
            DB::delete('delete from cart_items where id = ? and token = ?', [$id,$token]);
        }
        return redirect()->route('shopping-cart');
}
}