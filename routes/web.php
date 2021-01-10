<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\Crud\AddBooksController;
use App\Http\Controllers\EditBooksController;
use Illuminate\Support\Facades\Route;

Route::get('/add', [AddBooksController::class, 'index'])->name('addbooks');
Route::post('/add', [AddBooksController::class, 'store']);

Route::get('/edit', [EditBooksController::class, 'index'])->name('editbooks');
Route::post('/edit', [EditBooksController::class, 'store']);

Route::get('/', [BooksController::class, 'index'])->name('books');
