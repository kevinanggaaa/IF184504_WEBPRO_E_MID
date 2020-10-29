<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/haris', function () {
    return view('test');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('admin')->group(function () {
    Route::resource('/bookCategories', BookCategoryController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/transactions', TransactionController::class);
});
