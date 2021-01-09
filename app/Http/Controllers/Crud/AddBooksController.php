<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddBooksController extends Controller
{
    public function index()
    {
        return view('crud.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
        ]);

        dd($request->title);
    }
}
