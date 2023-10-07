<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProductController::class,'index']);
Route::get('/about',[ProductController::class,'about']);
Route::get('/contact',[ProductController::class,'contact']);
Route::get('/products/detail/{product:name}',[ProductController::class,'detail']);

Route::middleware(AuthMiddleware::class)->group(function(){
    Route::get('/products/categories/{category:slug}',[ProductController::class,'category']);
    Route::get('/products/{product}/AddToCart',[ProductController::class,'AddToCart']);
    Route::get('/user/{user}/addToCartProducts',[ProductController::class,'showProducts']);
    Route::get('/removeCart/{product}',[ProductController::class,'removeCart']);
    Route::post('/{product:name}/comments',[CommentController::class,'store']);
    Route::delete('/comments/{comment}/delete',[CommentController::class,'delete']);
    Route::patch('/comments/{comment}/update',[CommentController::class,'update']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::patch('/updateProfilePhoto/images/{photoUrl}',[AuthController::class,'updatePhoto']);
    Route::patch('/updateProfileName',[AuthController::class,'updateName']);
    Route::middleware(AdminMiddleware::class)->group(function(){
        Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::get('/admin/createProduct',[AdminController::class,'create']);
        Route::post('/admin/store',[AdminController::class,'store']);
        Route::delete('/admin/dashboard/delete/{product:name}',[AdminController::class,'delete']);
        Route::get('/admin/dashboard/edit/{product}',[AdminController::class,'edit']);
        Route::put('/admin/dashboard/update/{product}',[AdminController::class,'update']);
    });
    Route::post('/subscriber',[SubscriberController::class,'store']);
});

Route::middleware('guest')->group(function(){
    Route::get('/register',[AuthController::class,'register']);
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/register/store',[AuthController::class,'store']);
    Route::post('/login',[AuthController::class,'loginStore']);
});

