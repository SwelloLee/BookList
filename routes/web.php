<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\Crud\AddBooksController;
use App\Http\Controllers\Crud\EditBooksController;
use App\Http\Controllers\ExportBooksController;
use Illuminate\Support\Facades\Route;

Route::get('/add', [AddBooksController::class, 'index'])->name('addbooks');
Route::post('/add', [AddBooksController::class, 'add']);

Route::get('/edit', [EditBooksController::class, 'index'])->name('editbooks');
Route::post('/edit', [EditBooksController::class, 'update']);
Route::post('/edit/{book}', [EditBooksController::class, 'show'])->name('editbooks.edit');

Route::get('/export', [ExportBooksController::class, 'index'])->name('exportbooks');
Route::post('/export', [ExportBooksController::class, 'export']);

Route::get('/', [BooksController::class, 'index'])->name('books');
Route::post('/', [BooksController::class, 'sort']);
Route::post('/', [BooksController::class, 'search'])->name('books.search');
Route::delete('/{book}', [BooksController::class, 'delete'])->name('books.delete');
