<?php

use Illuminate\Support\Facades\Route;

Route::get('/booklist', function () {
    return view('books.index');
});
