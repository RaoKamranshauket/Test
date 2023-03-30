<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ViewOrdersController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishListController;

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

Route::get('/' , [FrontendController::class , 'index']);
Route::get('category' , [FrontendController::class , 'category']);
Route::get('view-category/{slug}' , [FrontendController::class , 'viewcategory']);
Route::get('view-product/{cate_slug}/{pro_slug}' , [FrontendController::class , 'viewproduct']);
  Auth::routes();

  Route::post('add-cart' , [CartController::class , 'addProduct']);
  Route::post('remove-cart' , [CartController::class , 'removecart']);
  Route::post('add-wishlist' , [WishListController::class , 'addWishList']);

  Route::middleware(['auth'])->group(function (){

      Route::get('view-cart' , [CartController::class , 'viewProduct']);
      Route::post('update-cart' , [CartController::class , 'updateProduct']);
      Route::get('checkout-cart' , [CheckoutController::class , 'checkout']);
      Route::post('place-order' , [CheckoutController::class , 'placeorder']);
      Route::get('my-orders' , [UserController::class , 'index']);
      Route::get('view-order-details/{id}' , [UserController::class , 'Order_details']);
      Route::get('View-PendingOrders' , [ViewOrdersController::class , 'index']);
      Route::get('view-pendingorder-details/{id}' , [ViewOrdersController::class , 'PendingOrder_details']);
      Route::post('Update-Status' , [ViewOrdersController::class , 'UpdateStatus']);
      Route::get('completed-orders' , [ViewOrdersController::class , 'CompletedOrders']);
      Route::get('View-Users' , [UsersController::class , 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','isAdmin'])->group(function (){

    Route::get('dashboard','Admin\FrontendController@index');
    Route::get('add-category','Admin\CategoryController@index');
    Route::get('insert-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');

    Route::get('update/{id}' , [CategoryController::class , 'edit']);
    Route::post('update/{id}' , [CategoryController::class , 'update']);
    Route::get('delete/{id}',[CategoryController::class,'delete']);

    Route::get('product','Admin\ProductController@index');
    Route::get('Add-Product','Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('update-product/{id}' , [ProductController::class , 'edit']);
    Route::post('update-product/{id}' , [ProductController::class , 'update']);
    Route::get('delete-product/{id}',[ProductController::class,'delete']);

});
