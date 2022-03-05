<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Shop\VendorsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController as APIProductController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\ShoppingCartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\SiteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\Shop\CartItemController;
use App\Http\Controllers\Shop\OrderController;
use App\Http\Controllers\Shop\WishListController;
use App\Http\Resources\ProductResource;
use App\Mail\Email;
use App\Models\Shop\CartItem;
use App\Models\Shop\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localizationRedirect', 'localeViewPath' ]
    ],
    function()
{
Route::get('/', [Controller::class, 'show'])->name('welcome');
Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('contact', [SiteController::class, 'contact'])->name('contact');
Route::get('about', [SiteController::class, 'about'])->name('about');
// Route::get('profile',[SiteController::class, 'profile'])->name('profile')->middleware('verified');
Route::get('shopping-cart',[ShoppingCartController::class, 'index'])->name('shopping-cart');
Route::get('settings',[SiteController::class, 'settings'])->name('settings');
Route::post('add-to-cart',[CartItemController::class, 'store'])->name('add-to-cart');
Route::get('add-to-wishlist/{id}',[WishListController::class, 'store'])->name('add-to-wishlist');
Route::get('wishlist',[WishListController::class, 'index'])->name('wishlist');
Route::get('delete-wishlist/{id}',[WishListController::class, 'destroy'])->name('delete-wishlist');
Route::get('delete-cart-item/{id}',[CartItemController::class, 'destroy'])->name('delete-cart-item');
Route::get('product-details/{id}',[ProductController::class, 'details'])->name('product-details');
Route::get('choose-product/{id}',[ProductController::class, 'chooseProduct'])->name('choose-product');
Route::post('add-order', [OrderController::class, 'store'])->name('add-order');
Route::get('thank-you/{name}',[Controller::class, 'thank_you_page'])->name('thank-you');
Route::post('add-cart', [CartController::class, 'store'])->name('add-cart');
Route::get('vendor/{id}', [Controller::class, 'vendor'])->name('vendor');
Route::get('category/{id}', [Controller::class, 'category'])->name('category');
Route::get('all-products', [Controller::class, 'AllProducts'])->name('all-products');
Route::get('all-offers', [Controller::class, 'AllOffers'])->name('all-offers');
Route::get('all-hot-deals', [Controller::class, 'AllHotDeals'])->name('all-hot-deals');
Route::get('tag/{slug}', [PostsController::class, 'tag'])->name('tag');
Route::get('post/{slug}', [PostsController::class, 'post'])->name('post');
Route::get('posts', [PostsController::class,'index'])->name('posts');
Route::get('api/products', [APIProductController::class,'index']);

// Route::get('/test', function(){
//    return view('shop.pages.test');
// });

// Route::post('hello', function () {
//     return 1;
// })->name('hello');

 // do the "testimonials" function in controller class
 Route::get('testimonials', [Controller::class, 'testimonials'])->name('testimonials');

 //do the add-sbscriber function in Controller
 Route::post('subscribe', [Controller::class, 'StoreSubscriber'])->name('subscribe');

 //do the sendEmail function in  class
 Route::post('send-message', [MessageController::class, 'store'])->name('send-message');




    // START AUTHENTICATION CONTROLLER
    Route::get('admin/login', [LoginController::class, 'getLogin'])->name('get.admin.login');
    Route::post('admin/login', [LoginController::class,'login'])->name('admin.login');
    // Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('logout', function ()
        {
            Auth::logout();
            Session()->flush();

            return Redirect::to('/');
        })->name('logout');

    Auth::routes(['register' => true,'verify' => true,'reset' => true]);
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Auth::routes();
    // END AUTHENTICATION CONTROLLER
    
    Route::get('send-mail', function () {
        $details = [
            'title' => 'Mail from Abdelkhalek HADDANY',
            'body' => 'This is for testing email using smtp'
        ];
        Mail::to('haddany20@gmail.com')->send(new Email($details));

        dd("Email is Sent.");
    });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new_products',[Controller::class, 'new_products'])->name('new_products');

});