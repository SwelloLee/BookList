<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        session()->put('forms.sort', $request->sort);

        $sort_values = explode('-', $request->sort);

        if(count($sort_values) > 1){
            $column = $sort_values[0];
            $order = $sort_values[1];
        } else {
            $column = 'title';
            $order = 'asc';
        }

        $books = Book::orderBy($column, $order)
            ->where('title', 'like', '%'.$request->search.'%')
            ->orWhere('author', 'like', '%'.$request->search.'%')
            ->paginate(10);

        return view('books.index', [
            'books' => $books
        ]);

        /*$books = Book::orderBy('id', 'asc')->paginate(10);
        return view('books.index', [
            'books' => $books
        ]);*/
    }

    public function delete(Book $book)
    {
        $book->delete();

        return back()->with('success', 'Book successfully deleted');
    }

    public function sort(Request $request)
    {
        $books = Book::orderBy($request->sort, 'asc')->paginate(10);
        return view('books.index', [
            'books' => $books
        ]);
    }

    public function search(Request $request)
    {
        $sort_values = explode('-', $request->sort);

        $books = Book::orderBy($sort_values[0], $sort_values[1])
            ->where('title', 'like', '%'.$request->search.'%')
            ->orWhere('author', 'like', '%'.$request->search.'%')
            ->paginate(10);

        return view('books.index', [
            'books' => $books
        ]);
    }

}
