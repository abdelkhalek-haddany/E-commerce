<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Vendor\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\OrdersController;
use App\Http\Controllers\Vendor\ProductsController;

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


    /*------------------------------------------
        CURD ROUTES FOR AUTHENTICATION
    --------------------------------------------*/

// Route::get('home', [HomeController::class,, 'index'])->name('home');
// Auth::routes();

Route::group(['middleware'=>['auth','vendor'],'prefix'=>'shop'],function(){

    Route::get('/dashboard', [HomeController::class, 'index'])->name('vendor.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile_update/{id}', [ProfileController::class, 'update'])->name('profile_update');
    Route::get('/api/orders', [OrdersController::class ,'index']);


    ######################### Begin Products Routes ########################
    Route::group(['prefix' => 'products'], function () {
        Route::get('/',[ProductsController::class, 'index']) -> name('v_products.index');
        Route::get('create',[ProductsController::class, 'create']) -> name('v_products.create');
        Route::post('store',[ProductsController::class, 'store']) -> name('v_products.store');
        Route::get('edit/{id}',[ProductsController::class, 'edit']) -> name('v_products.edit');
        Route::post('update/{id}',[ProductsController::class, 'update']) -> name('v_products.update');
        Route::get('delete/{id}',[ProductsController::class, 'destroy']) -> name('v_products.destroy');
        Route::get('changeStatus/{id}',[ProductsController::class, 'changeStatus'])->name('v_products.status');
    });
    ######################### End  Products Routes  ########################
    Route::get('orders',  [OrdersController::class,'orders'])->name('get-v_orders');
});