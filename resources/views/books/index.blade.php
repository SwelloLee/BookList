@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            <h3 class="font-semibold mb-4">List of Book</h3>

            @if ($books->count())
                @foreach ($books as $book)
                    <div class="mb-4 flex">
                        <div class="w-2/3">
                            <div class="w-2/3">{{ $book->title }}</div>
                            <div class="w-1/3">{{ $book->author }}</div>
                        </div>
                        <div class="w-1/3">
                            <a class="bg-green-500 text-white px-4 py-2 rounded dont-medium">Edit</a>
                            <button class="bg-red-500 text-white px-4 py-2 rounded dont-medium">Delete</button>
                        </div>
                    </div>
                @endforeach
            @else
                <p>There are currently no Posts</p>
            @endif

        </div>
    </div>
@endsection
