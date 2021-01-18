@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mb-6">

            @if(Session::has('success'))
                <div class="w-full bg-green-400 text-white rounded p-4 mb-4 font-medium">{{ Session::get('success') }}</div>
            @endif

            <h2 class="font-semibold mb-4">List of Books</h2>

            <div class="flex mb-4">
                <form action="{{ route('books') }}" method="get" class="w-full flex">
                    @csrf
                    <!-- Option values here are switched because of how the forloop will iterate through the query later on -->
                    <select id="sort" name="sort" class="bg-white-100 border-2 p-2 rounded">
                        <option value="title-asc" @if( session('forms.sort')  == "title-asc") selected="selected" @endif>Sort: Title Desc</option>
                        <option value="title-desc" @if( session('forms.sort')  == "title-desc") selected="selected" @endif>Sort: Title Asc</option>
                        <option value="author-asc" @if( session('forms.sort')  == "author-asc") selected="selected" @endif>Sort: Author Desc</option>
                        <option value="author-desc" @if( session('forms.sort')  == "author-desc") selected="selected" @endif>Sort: Author Asc</option>
                    </select>

                    <label for="search" class="sr-only">Title</label>
                    <input name="search" id="search" class="bg-gray-100 border-2 w-full p-2 mx-2 rounded" placeholder="Search" value="{{old('search')}}">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded align-middle font-semibold transition-colors hover:bg-blue-400">Search</button>

                </form>
            </div>

            @if ($books->count())

                <div class="mb-2 px-4 flex">
                    <div class="w-4/5 flex">
                        <form action="{{ route('books', 'sort') }}" method="post" class="w-2/3">
                            @csrf
                            <input name="sort" id="sort" class="hidden" value="title">
                            <button type="submit" class="rounded align-middle font-semibold transition-colors hover:bg-gray-200">Title</button>
                        </form>
                        <form action="{{ route('books', 'sort') }}" method="post" class="w-1/3">
                            @csrf
                            <input name="sort" id="sort" class="hidden" value="author">
                            <button type="submit" class="rounded align-middle font-semibold transition-colors hover:bg-gray-200">Author</button>
                        </form>
                    </div>
                    <div class="w-1/5 flex justify-end">
                        <h3 class="font-semibold">Actions</h3>
                    </div>
                </div>

                <div class="rounded bg-gray-100 overflow-hidden mb-4">
                @foreach ($books as $book)
                    <div class="flex px-4 py-2 transition-colors hover:bg-gray-200 hover:bg-opacity-25">
                        <div class="w-4/5 flex self-center">
                            <h3 class="w-2/3 border-r-2 border-gray-200 mr-5">{{ $book->title }}</h3>
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
                </div>
            @else
                <div class="rounded bg-gray-100 p-4 mb-4 text-center font-medium text-gray-500">There are no books here :(</div>
            @endif


            <div class="px-4">{{$books->withQueryString()->links()}}</div>

            <a href="{{ route('exportbooks') }}" class="w-100 bg-yellow-500 text-white text-center mt-4 px-4 py-2 rounded float-right font-semibold transition-colors hover:bg-yellow-400">Export</a>

        </div>
    </div>
@endsection
