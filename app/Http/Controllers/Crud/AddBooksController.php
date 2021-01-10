<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class AddBooksController extends Controller
{
    public function index()
    {
        return view('crud.add');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author
        ]);

        return redirect()->route('books')->with('success', 'Book successfully added');
    }
}
