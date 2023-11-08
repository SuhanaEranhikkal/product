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
Route::get('/',[ProductController::class,'index'])->name('list');
Route::post('store',[ProductController::class ,'store'])->name('store');
Route::get('create',[ProductController::class ,'create'])->name('create');
Route::get('edit/{product}',[ProductController::class ,'edit'])->name('product_edit');
Route::put('update/{product}',[ProductController::class ,'update'])->name('update');
Route::delete('delete/{product}',[ProductController::class ,'destroy'])->name('delete');
Route::get('export_excel',[ProductController::class,'excel_export'])->name('export_excel');
Route::get('export_pdf',[ProductController::class,'pdf_export'])->name('export_pdf');

