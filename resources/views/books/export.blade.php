@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/4 bg-white p-6 rounded-lg mb-6">

            <h2 class="font-semibold mb-4">Export List of Books</h2>

            <div class="flex mb-4">
                <form action="{{ route('exportbooks') }}" method="post" class="w-full flex">
                    @csrf
                    <!-- Option values here are switched because of how the forloop will iterate through the query later on -->
                    <select id="exportlist" name="list" class="w-full bg-white-100 border-2 p-2 rounded">
                        <option value="titleauth">Title and Author</option>
                        <option value="title">Title Only</option>
                        <option value="author">Author Only</option>
                    </select>

                    <select id="file" name="file" class="bg-white-100 border-2 p-2 mx-2 rounded">
                        <option value="csv">CSV</option>
                        <option value="xml">XML</option>
                    </select>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded align-middle font-semibold transition-colors hover:bg-blue-400">Export</button>

                </form>
            </div>

        </div>
    </div>
@endsection
