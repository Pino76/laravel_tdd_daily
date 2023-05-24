<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
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



Route::post('/books', [BookController::class, 'store'])->name('book.store');

Route::patch('/books/{book}', [BookController::class, 'update'])->name('book.update');