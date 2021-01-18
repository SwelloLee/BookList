<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class EditBooksController extends Controller
{
    public function index(Book $book)
    {
        return view('crud.edit', [
            'book' => $book
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
        ]);

        Book::whereId($request->bookID)->update([
            'title' => $request->title,
            'author' => $request->author
        ]);

        return redirect()->route('books')->with('success', 'Book successfully edited');
    }

    public function show(Book $book)
    {
        return view('crud.edit', [
            'book' => $book
        ]);
    }
}
