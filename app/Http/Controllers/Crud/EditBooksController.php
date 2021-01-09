<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditBooksController extends Controller
{
    public function index()
    {
        return view('crud.edit');
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
