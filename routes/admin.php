<?php
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\Blog\TagController;
use App\Http\Controllers\Admin\Blog\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Shop\CategoriesController;
use App\Http\Controllers\Admin\Shop\DashboardController;
use App\Http\Controllers\Admin\Shop\LanguagesController;
use App\Http\Controllers\Admin\Shop\livreursController;
use App\Http\Controllers\Admin\Shop\OrdersController;
use App\Http\Controllers\Admin\Shop\ProductsController;
use App\Http\Controllers\Admin\Shop\PublicController;
use App\Http\Controllers\Admin\Shop\SubCategoriesController;
use App\Http\Controllers\Admin\Shop\VendorsController;
use App\Http\Controllers\Admin\SupportController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>['auth','admin'],'prefix'=>'admin'],function(){
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile_update/{id}', [ProfileController::class, 'update'])->name('profile_update');
    Route::get('/api/orders', [OrdersController::class ,'index']);
    Route::get('orders/destroy/{id}',[OrdersController::class, 'destroy']);

    ######################### Begin Languages Route ########################
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/',[LanguagesController::class, 'index']) -> name('languages.index');
        Route::get('create',[LanguagesController::class, 'create']) -> name('languages.create');
        Route::post('store',[LanguagesController::class, 'store']) -> name('languages.store');
        Route::get('edit/{id}',[LanguagesController::class, 'edit']) -> name('languages.edit');
        Route::post('update/{id}',[LanguagesController::class, 'update']) -> name('languages.update');
        Route::get('delete/{id}',[LanguagesController::class, 'destroy']) -> name('languages.destroy');
        Route::get('changeStatus/{id}',[LanguagesController::class, 'changeStatus']) -> name('languages.status');

    });
    ######################### End Languages Route ########################

    ######################### Begin Main Categoris Routes ########################
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/',[CategoriesController::class, 'index']) -> name('categories.index');
        Route::get('create',[CategoriesController::class, 'create']) -> name('categories.create');
        Route::post('store',[CategoriesController::class, 'store']) -> name('categories.store');
        Route::get('edit/{id}',[CategoriesController::class, 'edit']) -> name('categories.edit');
        Route::post('update/{id}',[CategoriesController::class, 'update']) -> name('categories.update');
        Route::get('delete/{id}',[CategoriesController::class, 'destroy']) -> name('categories.destroy');
        Route::get('changeStatus/{id}',[CategoriesController::class, 'changeStatus']) -> name('categories.status');

    });
    ######################### End  Main Categoris Routes  ########################


    ######################### Begin vendors Routes ########################
    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/',[VendorsController::class, 'index']) -> name('vendors.index');
        Route::get('create',[VendorsController::class, 'create']) -> name('vendors.create');
        Route::post('store',[VendorsController::class, 'store']) -> name('vendors.store');
        Route::get('edit/{id}',[VendorsController::class, 'edit']) -> name('vendors.edit');
        Route::post('update/{id}',[VendorsController::class, 'update']) -> name('vendors.update');
        Route::get('delete/{id}',[VendorsController::class, 'destroy']) -> name('vendors.destroy');
        Route::get('changeStatus/{id}',[VendorsController::class, 'changeStatus'])->name('vendors.status');
    });
    
    ######################### End  vendors Routes  ########################

    ######################### Begin livreurs Routes ########################
    Route::group(['prefix' => 'livreurs'], function () {
        Route::get('/',[LivreursController::class, 'index']) -> name('livreurs.index');
        Route::get('create',[LivreursController::class, 'create']) -> name('livreurs.create');
        Route::post('store',[LivreursController::class, 'store']) -> name('livreurs.store');
        Route::get('edit/{id}',[LivreursController::class, 'edit']) -> name('livreurs.edit');
        Route::post('update/{id}',[LivreursController::class, 'update']) -> name('livreurs.update');
        Route::get('delete/{id}',[LivreursController::class, 'destroy']) -> name('livreurs.destroy');
        Route::get('changeStatus/{id}',[LivreursController::class, 'changeStatus'])->name('livreurs.status');
    });
    
    ######################### End  livreurs Routes  ########################

    ######################### Begin Products Routes ########################
    Route::group(['prefix' => 'products'], function () {
        Route::get('/',[ProductsController::class, 'index']) -> name('products.index');
        Route::get('create',[ProductsController::class, 'create']) -> name('products.create');
        Route::post('store',[ProductsController::class, 'store']) -> name('products.store');
        Route::get('edit/{id}',[ProductsController::class, 'edit']) -> name('products.edit');
        Route::post('update/{id}',[ProductsController::class, 'update']) -> name('products.update');
        Route::get('delete/{id}',[ProductsController::class, 'destroy']) -> name('products.destroy');
        Route::get('changeStatus/{id}',[ProductsController::class, 'changeStatus'])->name('products.status');
    });
    ######################### End  Products Routes  ########################

    ######################### Start Posts Routes  ########################

    Route::group(['prefix' => 'post'], function () {
        Route::get('/',[PostController::class, 'index']) -> name('posts.index');
        Route::get('create',[PostController::class, 'create']) -> name('posts.create');
        Route::post('store',[PostController::class, 'store']) -> name('posts.store');
        Route::get('edit/{id}',[PostController::class, 'edit']) -> name('posts.edit');
        Route::post('update/{id}',[PostController::class, 'update']) -> name('posts.update');
        Route::get('delete/{id}',[PostController::class, 'destroy']) -> name('posts.destroy');
        Route::get('changeStatus/{id}',[PostController::class, 'changeStatus'])->name('posts.status');
    });

    ######################### End  Posts Routes  ########################

    Route::get('orders',  [PublicController::class,'orders'])->name('get-orders');
    Route::resource('tags', TagController::class);
    Route::resource('testimonials', TestimonialController::class);

    ######################### Start  Messages Routes  ########################
    Route::get('messages', [MessageController::class, 'show'])->name('messages');    
    Route::get('delete-messages/{id}', [MessageController::class, 'delete'])->name('delete-messages');
    // Route::get('reading-messages/{id}', [MessageController::class, 'update_reading'])->name('reading-messages');
    // Route::get('answering-messages/{id}', [MessageController::class, 'update_answering'])->name('answering-messages');
    ######################### End  Messages Routes  ########################

    ######################### Start  Subscribers Routes  ########################
    Route::post('add-subscriber', [SubscriberController::class, 'store'])->name('add-subscriber');
    Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers');
    Route::get('delete-subscribers/{id}', [SubscriberController::class, 'delete'])->name('delete-subscribers');
    ######################### End  Subscribers Routes  ########################

    ######################### Start  Support Routes  ########################
    Route::get('support', [SupportController::class, 'support'])->name('support');
    Route::get('documentation', [SupportController::class, 'documentation'])->name('documentation');
    ######################### End  support Routes  ########################
    
    });