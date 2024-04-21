<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleWare;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get("/", function () {
//     return view("homepage.index");
// });
Route::get('/', [HomeController::class, "index"])->name('homepage.index');
Route::get('register',[RegisterController::class,"index"])->name('register.index');
Route::post('register',[RegisterController::class,"store"])->name('register.store');

Route::get('login',[AuthController::class,"index"])->name('login.index');
Route::post('login', [AuthController::class,'store'])->name('login.doLogin');

Route::middleware(['auth','admin'])->group(function (){
    Route::get('admin',[AdminController::class,"index"])->name('admin.index');
    Route::get('admin/product/create',[ProductController::class,'create'])->name('admin.create');
    Route::post('admin/product/create', [ProductController::class, 'store'])->name('admin.product.store');
}
);


