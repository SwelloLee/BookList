<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Book List</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items center">
                <li>
                    <a href="{{ route('books') }}" class="p-3 font-semibold">Book List</a>
                </li>
            </ul>

            <ul class="flex items center">
                <li>
                    <a href="{{ route('addbooks') }}" class="p-3 bg-blue-500 text-white px-4 py-2 rounded dont-medium">Add Book</a>
                </li>
            </ul>
        </nav>

        @yield('content')
    </body>
</html>
