<?php

use App\Http\Controllers\backend\ChefController;
use App\Http\Controllers\backend\CuisineController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ItemController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\SliderController;
use App\http\Controllers\frontend\HomeController;
use App\http\Controllers\frontend\MenuController;
use App\http\Controllers\frontend\SingleItemController;
use App\http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\ChefController as FrontendChefController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/menu',[MenuController::class,'index'])->name('menu');
Route::get('/view-item/{id}',[MenuController::class,'show_items'])->name('view.items');
Route::get('/popular-item',[MenuController::class,'popular_items'])->name('popular.items');

Route::get('/single-item/{id}',[SingleItemController::class,'index'])->name('single_item');
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::post('/add_cart/{id}',[CartController::class,'add_cart'])->name('mycart');
Route::post('/remove_cart/{id}',[CartController::class,'remove_cart'])->name('remove.cart');

Route::get('/checkout/{id}/{sub_total}/{order_total}',[CheckoutController::class,'index'])->name('checkout');
Route::post('/bill_details/{id}/{sub_total}/{order_total}',[CheckoutController::class,'bill_details'])->name('bill_details');

Route::get('/chefs',[FrontendChefController::class,'index'])->name('chefs');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


    Route::get('/add-cuisine', [CuisineController::class,'create'])->name('add.cuisine');
    Route::post('/store-cuisine', [CuisineController::class,'store'])->name('store.cuisine');
    Route::get('/manage-cuisine', [CuisineController::class,'index'])->name('manage.cuisine');
    Route::get('/edit-cuisine/{id}', [CuisineController::class,'edit'])->name('edit.cuisine');
    Route::post('/update-cuisine/{id}', [CuisineController::class,'update'])->name('update.cuisine');
    Route::get('/destroy-cuisine/{id}', [CuisineController::class,'destroy'])->name('destroy.cuisine');


    Route::get('/add-item', [ItemController::class,'create'])->name('add.item');
    Route::post('/store-item', [ItemController::class,'store'])->name('store.item');
    Route::get('/manage-item', [ItemController::class,'index'])->name('manage.item');
    Route::get('/status/{id}',[ItemController::class,'change_status'])->name('status');
    Route::get('/edit-item/{id}', [ItemController::class,'edit'])->name('edit.item');
    Route::post('/update-item/{id}',[ItemController::class,'update'])->name('update.item');
    Route::get('/destroy-item/{id}', [ItemController::class,'destroy'])->name('destroy.item');

    
    Route::get('/add-slider', [SliderController::class,'create'])->name('add.slider');
    Route::post('/store-slider', [SliderController::class,'store'])->name('store.slider');
    Route::get('/manage-slider', [SliderController::class,'index'])->name('manage.slider');
    Route::get('/edit-slider/{id}', [SliderController::class,'edit'])->name('edit.slider');
    Route::post('/update-slider/{id}', [SliderController::class,'update'])->name('update.slider');
    Route::get('/destroy-slider/{id}', [SliderController::class,'destroy'])->name('destroy.slider');

    Route::get('/manage-order', [OrderController::class,'index'])->name('manage.order');
    Route::get('/destroy-order/{id}', [OrderController::class,'destroy'])->name('destroy.order');

    Route::get('/add-chef', [ChefController::class,'create'])->name('add.chef');
    Route::post('/store-chef', [ChefController::class,'store'])->name('store.chef');
    Route::get('/manage-chef', [ChefController::class,'index'])->name('manage.chef');
    Route::get('/edit-chef/{id}', [ChefController::class,'edit'])->name('edit.chef');
    Route::post('/update-chef/{id}', [ChefController::class,'update'])->name('update.chef');
    Route::get('/destroy-chef/{id}', [ChefController::class,'destroy'])->name('destroy.chef');
});
