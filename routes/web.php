<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\OrdersController;
use \App\Http\Controllers\HomeController;
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


Route::resource('home', HomeController::class);
Route::get('cart', [HomeController::class, 'cartList'])->name('cart.list');
Route::post('cart', [HomeController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [HomeController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [HomeController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [HomeController::class, 'clearAllCart'])->name('cart.clear');
Route::post('add-order', [HomeController::class, 'addOrder'])->name('cart.addOrder');
Route::get('user-orders', [HomeController::class, 'userOrders'])->name('home.userOrders');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('orders', OrdersController::class);
    Route::resource('products', ProductsController::class);
});



require __DIR__.'/auth.php';
