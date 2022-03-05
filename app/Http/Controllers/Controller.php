<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Http\Requests\SubscriberRquest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Blog\Post;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use App\Models\Shop\Category;
use App\Models\Shop\NoAuthCartItem;
use App\Models\Testimonial;
use App\Models\Shop\Product;
use App\Models\Shop\Vendor;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Lang;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // get the portfolio from database and show the welcome page
    public function show(Request $request)
    {
        $news= Post::query()
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $newProducts = Product::query()
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $randomProducts = Product::inRandomOrder()
            ->where('is_published', true)
            ->limit(8)
            ->get();
        $hotDeals = Product::query()
            ->where('is_published', true)
            ->where('type', 2)
            ->where('endsAt','>',now())
            ->limit(3)
            ->get();
        $offers = Product::query()
            ->where('is_published', true)
            ->where('type', 3)
            ->limit(4)
            ->get();

            $siderProducts= array();
            if(count($offers)>0) array_push( $siderProducts,$offers[0]);
            if(count($hotDeals)>0) array_push( $siderProducts,$hotDeals[0]);
            if(count($newProducts)>0) array_push( $siderProducts,$newProducts[0]);
            if(count($randomProducts)>0) array_push( $siderProducts,$randomProducts[0]);
        return view('shop.pages.welcome', compact('siderProducts','offers','news','newProducts','randomProducts','hotDeals'));

    }

    public function AllProducts(){
         $products = Product::where('is_published','1')->get();
         return view('shop/pages/all-products', compact('products'));
    }
    public function AllOffers(){
        $offers = Product::where('is_published','1')->where('type','3')->get();
        return view('shop/pages/all-offers', compact('offers'));
   }
   public function AllHotDeals(){
    $hotDeals = Product::where('is_published','1')->where('type','2')->where('endsAt','>',now())->get();
    return view('shop/pages/all-hot-deals', compact('hotDeals'));
}

    // show the about page
    public function about()
    {
        return view('pages.about');
    }
    // show the contact page
    public function contact()
    {
        return view('pages.contact');
    }
     // show the vendor page
     public function vendor($id)
     {
         $vendor = User::where('id',$id)->get();
         $products = Product::where('vendor_id',$id)->get();
         $vendor= $vendor[0];
         return view('shop.pages.vendor', compact('vendor','products'));
     }


      // show the category page
      public function category($id)
      {

          $category = Category::where('id',$id)->get()->first();
          if($category){
          $products = Product::where('category_id',$category->id)->get();
          return view('shop.pages.category', compact('category','products'));
        }else{
            return view('shop/pages/welcome');
        }
      }


    // get the testimonials from database and show the testimonials page
    public function testimonials()
    {
        $Testimonials = Testimonial::getQuery()->orderBy('id', 'desc')->get();
        return view('shop.pages.testimonials')->with('Testimonials', $Testimonials);
    }

    public function thank_you_page($name){
        return view('shop.pages.thank-you',compact('name'));
    }
    
    // add subsecriber
    public function StoreSubscriber(SubscriberRequest $request)
    {
        $Subscriber = new Subscriber;
        $Subscriber->email = $request->email;
        $Subscriber->save();
        return response(['message' => 'Created successfully'],200);
    }
    }
