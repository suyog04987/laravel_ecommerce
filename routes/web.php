<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

Route::get('/',[HomeController::class,'index'],'index');

Route::get('/redirect',[HomeController::class,'redirect'],'redirect');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/view_catagory',[AdminController::class,'view_catagory'],'view_catagory');


Route::post('/add_catagory',[AdminController::class,'add_catagory'],'add_catagory');

Route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory'],'delete_catagory');

Route::get('/view_product',[AdminController::class,'view_product'],'view_product');

Route::post('/add_product',[AdminController::class,'add_product'],'add_product');
Route::get('/show_product',[AdminController::class,'show_product'],'show_product');

Route::get('/delete_product/{id}',[AdminController::class,'delete_product'],'delete_product');

Route::get('/edit_product/{product}',[AdminController::class,'edit_product'],'edit_product');

Route::post('/update_product/{id}',[AdminController::class,'update_product'],'update_product');


Route::get('/product_detail/{id}',[HomeController::class,'product_detail'],'product_detail');
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart/',[HomeController::class,'show_cart']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
