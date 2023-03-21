<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;

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
