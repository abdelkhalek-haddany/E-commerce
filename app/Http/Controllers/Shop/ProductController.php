<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Shop\Category;
use App\Models\Shop\Product;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function details($id){
        $product=Product::where('id',$id)->get()->first();
        if($product){
            $related_products = Product::where('category_id', $product->category_id)->get();    
            return view('shop/pages/product-details',compact('product','related_products'));
        }else{
            return view("pages/pages/welcome");
        }
    }
    
    public function chooseProduct(Request $request){
            $product=Product::findorfail($request->id);
            return response(['product' => $product],200);
    }
}