<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\StoreProductRequest;
use App\Http\Requests\Shop\UpdateProductRequest;
use App\Models\Shop\Category;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use App\Traits\ImgMultiUpTrait;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

use ImgMultiUpTrait;
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        if (!$request->has('is_published')){
            $is_published="0";
        }else{
            $is_published="1";
        }
        if($request->endsAt){
            $type=2;
        }else if($request->price<$request->old_price){
            $type=3;
        }else{
            $type=1;
        }
        try {
            $colors = $request->colors ? implode(',',$request->colors) : '';
            $imagesName = $this->SaveImage($request->images,'uploads/products');
                $product = new Product();
                $product->vendor_id = Auth::id();
                $product->category_id = $request->category_id;
                $product->title = $request->title;
                $product->images =$imagesName;
                $product->type = $type;
                $product->price = $request->price;
                $product->sizes = $request->sizes;
                $product->content = $request->content;
                $product->colors = $colors;
                $product->summary = $request->summary;
                $product->slug = $request->title;
                $product->quantity = $request->quantity;
                $product->sku = $request->quantity;
                $product->startsAt = $request->startsAt;
                $product->endsAt = $request->endsAt;
                $product->is_published = $is_published;
                $product->created_at= now();
                $product->updated_at= now();
                $product->save();
                return redirect()->route('products.index')->with(['success' => __('admin/messages.saved')]);

        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('products.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function edit($id)
    {
        $product=Product::findorfail($id);
        try {
            if (!$product)
                return redirect()->route('products.index')->with(['error' => __('admin/messages.deleted')]);
            $categories = Category::get();
            return view('admin.products.edit', compact('product', 'categories'));

        } catch (\Exception $exception) {
            return redirect()->route('products.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function update($id, UpdateProductRequest $request)
    {
        try {
            $product = Product::get()->find($id);
            if (!$product)
                return redirect()->route('products.index')->with(['error' => __('admin/messages.error')]);

            // if($request->images){
            // $imagesName = $this->SaveImage($request->images,'uploads/products');
            // }else{
            //     $imagesName = $product->images;
            // }
            $pro = Product::where('id',$id)->get()->first();

            $imagesName = ($request->images != null) 
            ? $this->SaveImage($request->images,'uploads/products') 
            :  $pro->images;

            if (!$request->has('is_published')){
                $is_published="0";
            }else{
                $is_published="1";
            }
                if($request->endsAt){
                    $type=2;
                }else if($request->price<$request->old_price){
                    $type=3;
                }else{
                    $type=1;
                }
                $colors = $request->colors ? implode(',',$request->colors) : $product->colors;
                $product->update([
                'title' => $request->title,
                'vendor_id'=> Auth::id(),
                'category_id' => $request->category_id,
                'images'=>$imagesName,
                'price' => $request->price,
                'type' => $type,
                'old_price' => $request->old_price,
                'sizes' => $request->sizes,
                'colors' => $colors,
                'content' => $request->content,
                'summary' => $request->summary,
                'slug' => $request->title,
                'quantity' => $request->quantity,
                'startsAt' => $request->startsAt,
                'endsAt' => $request->endsAt,
                'is_published' => $is_published,
                'updated_at'=> now(),
                ]);

            DB::commit();
            return redirect()->route('products.index')->with(['success' => __('admin/messages.updated')]);
        } catch (\Exception $exception) {
            return $exception;
            DB::rollback();
            return redirect()->route('products.index')->with(['error' => __('admin/messages.error')]);
        }

    }

    public function changeStatus($id)
    {
        try {
            $product = Product::find($id);
            if (!$product)
                return redirect()->route('products.index')->with(['error' => __('admin/messages.not_found')]);

           $status =  $product->is_published  == 0 ? '1' : '0';

           $product -> update(['is_published' =>$status ]);

            return redirect()->route('products.index')->with(['success' => __('admin/messages.status_changed')]);

        } catch (\Exception $ex) {
            return redirect()->route('products.index')->with(['error' => __('admin/messages.error')]);
        }
    }

    public function destroy($id)
    {

    try {
            $product = Product::find($id);
            
            if (!$product)
                return redirect()->route('products.index')->with(['error' => __('admin/messages.not_found')]);                
                $images = explode(',', $product->images);
                for($i=0; count($images)-1; $i++){
                    $image = public_path()."/uploads/products/".$images[$i];
                    if(file_exists($image)) unlink($image);
            }
            $product->delete();

            return redirect()->route('products.index')->with(['success' => __('admin/messages.deleted')]);

        } catch (\Exception $ex) {
            return redirect()->route('products.index')->with(['error' => __('admin/messages.deleted')]);
        }
    }
}