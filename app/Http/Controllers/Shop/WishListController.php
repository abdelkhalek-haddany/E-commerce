<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\CartItem;
use App\Models\Shop\NoAuthCart;
use App\Models\Shop\NoAuthWishlist;
use App\Models\Shop\Product;
use App\Models\Shop\Wishlist;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Parser\Token;

class WishListController extends Controller
{
    public function index(){
        if(Auth::check()){
            $wishlist=Wishlist::where('user_id',Auth::id())->get();
        }else{
            $token = Cookie::get('token') ? Cookie::get('token') : csrf_token();
            $wishlist=Wishlist::where('token',$token)->get();
        }
        return view('shop/pages/wishlist',compact('wishlist'));
    }
    public function store($id){
    $product = Product::where('id',$id)->get();
        if(Auth::check()){
            if(count(Wishlist::where('product_id',$id)->where('user_id',Auth::id())->get())<1){
            Wishlist::create([
                'product_id' => $id,
                'user_id'=> Auth::id(),
                'token'=>Cookie::get('token'),
            ]);
        }else{
            return redirect()->route('wishlist');
        }}else{
            $token = Cookie::get('token') ? Cookie::get('token') : csrf_token();
            if(count(Wishlist::where('product_id',$id)->where('token',$token)->get())<1){
                Wishlist::create([
                    'product_id' => $id,
                    'token'=>$token,
                    ]);
            Cookie::queue('token', $token , 86400*30);
        }else{
            return redirect()->route('wishlist');
        }
        }
        return redirect()->route('wishlist');

}

public function destroy($id)
    {
        if(Auth::check()){
            DB::delete('delete from wishlist where id = ? and user_id = ?', [$id,Auth::id()]);
        }else{
            $token = Cookie::get('token');
            DB::delete('delete from no_auth_wishlist where id = ? and token = ?', [$id,$token]);
        }
        return redirect()->route('wishlist');
}
}