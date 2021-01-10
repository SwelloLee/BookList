@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            @if(Session::has('success'))
                <div class="w-full bg-green-400 text-white rounded p-4 mb-4 font-medium">{{ Session::get('success') }}</div>
            @endif

            <h2 class="font-semibold mb-4">List of Books</h2>

            <div class="mb-2 px-4 flex">
                <div class="w-4/5 flex">
                    <h3 class="align-middle font-semibold w-2/3">Title</h3>
                    <h3 class="allign-middle font-semibold w-1/3">Author</h3>
                </div>
                <div class="w-1/5 flex justify-end">
                    <h3 class="font-semibold">Actions</h3>
                </div>
            </div>

            <div class="rounded bg-gray-100 overflow-hidden mb-4">
                @if ($books->count())
                    @foreach ($books as $book)
                        <div class="flex px-4 py-2 transition-colors hover:bg-gray-200">
                            <div class="w-4/5 flex self-center">
                                <h3 class="w-2/3">{{ $book->title }}</h3>
                                <h3 class="w-1/3">{{ $book->author }}</h3>
                            </div>
                            <div class="w-1/5 flex justify-end">
                                <form action="{{ route('editbooks.edit', $book) }}" method="post">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 mr-2 rounded font-medium transition-colors hover:bg-green-400">Edit</button>
                                </form>
                                <form action="{{ route('books.delete', $book) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-medium transition-colors hover:bg-red-400">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>There are currently no Books</p>
                @endif
            </div>

            <div class="px-4">{{$books->links()}}</div>

        </div>
    </div>
@endsection
