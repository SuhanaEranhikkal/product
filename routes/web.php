<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::get('/',[ProductController::class,'index']);
Route::post('store',[ProductController::class ,'store'])->name('store');
Route::get('create',[ProductController::class ,'create'])->name('create');
Route::get('edit/{id}',[ProductController::class ,'edit'])->name('edit');
Route::post('update/{id}',[ProductController::class ,'update'])->name('update');
