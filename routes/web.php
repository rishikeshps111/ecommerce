<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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


Route::get('/',[UserController::class,'homepage'])->name('homepage');
Route::post('/homepage',[UserController::class,'homepage'])->name('search');
Route::get('/contact',[UserController::class,'contact'])->name('contact');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'user_register'])->name('user_register');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'user_login'])->name('user_login');

Route::get('/logout',[UserController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/detail/{id}',[UserController::class,'detail'])->name('detail')->middleware('auth');
Route::get('/detail/{id}',[UserController::class,'detail'])->name('detail')->middleware('auth');
Route::post('/cart_submit',[UserController::class,'cart_submit'])->name('cart_submit')->middleware('auth');
Route::get('/cart_detail',[UserController::class,'cart_detail'])->name('cart_detail')->middleware('auth');
Route::get('/delete_cart/{id}',[UserController::class,'delete_cart'])->name('delete_cart')->middleware('auth');


Route::get('/admin',[AdminController::class,'admin'])->name('admin')->middleware('auth');
Route::get('/addproduct',[AdminController::class,'addproduct'])->name('addproduct')->middleware('auth');
Route::post('/addproduct',[AdminController::class,'product_submit'])->name('product_submit')->middleware('auth');
Route::get('/editproduct/{id}',[AdminController::class,'editproduct'])->name('editproduct')->middleware('auth');
Route::post('/edit_submit',[AdminController::class,'edit_submit'])->name('edit_submit')->middleware('auth');
Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct'])->name('deleteproduct')->middleware('auth');
Route::get('/logout',[AdminController::class,'logout'])->name('logout')->middleware('auth');

























