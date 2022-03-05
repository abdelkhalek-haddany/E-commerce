<?php
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\VendorController;
use App\Http\Resources\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('product/{id}', [ProductController::class, 'show'])->name('product');
// Route::get('products', [ProductController::class, 'index'])->name('products');
// Route::apiResource('livreurs', LivreurController::class);

// Route::middleware(['auth:api'],function(){
    // Route::apiResource('v_orders', VendorController ::class);
    // Route::apiResource('orders', OrderController::class);
    // Route::get('orders/destroy/{id}',[OrderController::class, 'destroy']);
// });

