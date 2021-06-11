<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\DashboardController::class,'index']);

Auth::routes();

Route::prefix('products')->group(function(){
    Route::get("",[App\Http\Controllers\ProductController::class,'index'])->name("products.index");
    Route::get("/create",[App\Http\Controllers\ProductController::class,'create'])->name("products.create");
    Route::post("/store",[App\Http\Controllers\ProductController::class,'store'])->name("products.store");
    Route::get("/edit/{id}",[App\Http\Controllers\ProductController::class,'edit'])->name("products.edit");
    Route::put("/update/{id}",[App\Http\Controllers\ProductController::class,'update'])->name("products.update");
    Route::delete("/delete/{id}",[App\Http\Controllers\ProductController::class,'destroy'])->name("products.delete");
    Route::get("/gallery/{id}",[App\Http\Controllers\ProductController::class,'gallery'])->name("products.gallery");
});

Route::prefix('galleries')->group(function(){
    Route::get("/products",[App\Http\Controllers\ProductGalleryController::class,'index'])->name("galleries.index");
    Route::get("/create",[App\Http\Controllers\ProductGalleryController::class,'create'])->name("galleries.create");
    Route::post("/store",[App\Http\Controllers\ProductGalleryController::class,'store'])->name("galleries.store");
    Route::delete("/delete/{id}",[App\Http\Controllers\ProductGalleryController::class,'destroy'])->name("galleries.delete");
});

Route::prefix("transactions")->group(function(){
    Route::get("" , [App\Http\Controllers\TransactionController::class,'index'])->name("transactions.index");
    Route::get("/show/{id}" , [App\Http\Controllers\TransactionController::class,'show'])->name("transactions.show");
    Route::get("/edit/{id}" , [App\Http\Controllers\TransactionController::class,'edit'])->name("transactions.edit");
    Route::put("/update/{id}" , [App\Http\Controllers\TransactionController::class,'update'])->name("transactions.update");
    Route::get("/status/{id}" , [App\Http\Controllers\TransactionController::class,'status'])->name("transactions.status");
    Route::delete("/delete/{id}" , [App\Http\Controllers\TransactionController::class,'destroy'])->name("transactions.delete");
});
