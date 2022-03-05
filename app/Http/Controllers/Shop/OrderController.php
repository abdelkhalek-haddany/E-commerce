<?php
namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\OrderRequest;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use App\Models\Shop\OrderItems;
use App\Models\Shop\Orders;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
        {
            try{
            $order = new Orders;
            $order->subTotal = $request->subTotal;
            $order->total = $request->total;
            $order->shipping = $request->shipping;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->phone = $request->phone;
            $order->city = $request->city;
            $order->province = $request->province;
            $order->country = $request->country;
            $order->created_at= now();
            $order->updated_at= now();
            $order->save();
            $orderItems=[];
            $token = Cookie::get('token');

            if(Auth::check()){
            $cartItems = CartItem::where('user_id', Auth::id())->get();
            try{
            foreach($cartItems as $ItemId => $item){
                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'color' =>$item->color,
                    'size' =>$item->size,
                    'quantity' =>$item->quantity
                ]);
            }
            }catch(Exception $ex){
            }
            CartItem::where('user_id', Auth::id())->forceDelete();
            
            }else{
            $cartItems = CartItem::where('token',$token)->get();
            try{
            foreach($cartItems as $ItemId => $item){
                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'color' =>$item->color,
                    'size' =>$item->size,
                    'quantity' =>$item->quantity
                ]);
            }
        }catch(Exception $ex){
        }
            $token = Cookie::get('token');
            CartItem::where('token', $token)->forceDelete();
        }
        $name = $request->first_name;
        return view('shop.pages.thank-you', compact('name'));
    }catch(Exception $e){
        return view('shop.pages.shopping-cart')->with(['error' => __('shop/global.error')]);;
    }
}}
