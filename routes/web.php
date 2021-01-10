<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\Crud\AddBooksController;
use App\Http\Controllers\Crud\EditBooksController;
use Illuminate\Support\Facades\Route;

Route::get('/add', [AddBooksController::class, 'index'])->name('addbooks');
Route::post('/add', [AddBooksController::class, 'add']);

Route::get('/edit', [EditBooksController::class, 'index'])->name('editbooks');
Route::post('/edit', [EditBooksController::class, 'update']);
Route::post('/edit/{book}', [EditBooksController::class, 'show'])->name('editbooks.edit');

Route::get('/', [BooksController::class, 'index'])->name('books');
Route::post('/', [BooksController::class, 'message']);
Route::delete('/{book}', [BooksController::class, 'delete'])->name('books.delete');
