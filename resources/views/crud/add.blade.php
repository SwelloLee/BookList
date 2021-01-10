@extends('layouts.app')

@section('content')
    <div class="flex justify-center">

        <div class="w-1/4">

            <div class="w-full mb-2">
                <a href="{{ route('books') }}" class="text-gray-400">< Back to Book List</a>
            </div>

            <div class="w-full bg-white p-6 rounded-lg">

                <h3 class="font-semibold mb-4">Add Book</h3>

                <form action="{{ route('addbooks') }}" method="post">

                    @csrf

                    <div class="mb-4">

                        <div class="mb-4">

                            <label for="title" class="sr-only">Title</label>
                            <input name="title" id="title" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                            @error('title') border-red-500 @enderror" placeholder="Book Title" value="{{old('title')}}">

                            @error('title')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label for="author" class="sr-only">Author</label>
                            <input name="author" id="author" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                            @error('author') border-red-500 @enderror" placeholder="Author" value="{{old('author')}}">

                            @error('author')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium w-full">Add Book to List</button>
                    </div>

                </form>
            </div>

        </div>

    </div>
@endsection
