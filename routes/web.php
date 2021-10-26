<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::resource('categories', PostController::class);
Route::get('contact', [HomeController::class, 'contact'])->name('contact.index');
Route::post('contact', [HomeController::class, 'send'])->name('contact.send');
Route::resource('products', ProductController::class);
Route::get('modal/{product}', [ProductController::class, 'showModal'])->name('showModal');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/{product}', [CartController::class, 'store'])->name('cart.store');
Route::patch('cart/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('coupon', [CouponController::class, 'store'])->name('coupon.store');
Route::delete('coupon', [CouponController::class, 'destroy'])->name('coupon.destroy');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index')->middleware('auth');
Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::view('confirmation', 'confirm')->name('confirmation');
Route::get('search', [HomeController::class, 'search'])->name('search');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
