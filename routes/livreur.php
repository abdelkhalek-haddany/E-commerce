<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Shop\ProductsController;
use App\Http\Controllers\Shop\LivreurDashboardController;

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

Route::group(['middleware'=>['auth','livreur'],'prefix'=>'livreur'],function(){
    Route::get('/dashboard', [LivreurDashboardController::class, 'index'])->name('livreur.dashboard');
    });