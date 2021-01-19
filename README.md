
## About BookList

This is a simple Laravel web application styled with Tailwindcss that displays a list of books and contains the basic CRUD functionalities you'd expect from an application like this. 


## Features

This iteration of the program comes with the ability to:

- Search through the records for an entry by title or author.
- Sort the results by book title or author.
- Add a new record to the list of books.
- Edit an existing record.
- Delete an existing record.
- Export the records into a csv or xml file.

For sorting, you can choose to either sort in ascending or descending order. For exporting you can choose between exporting only the Title list, only the Author List, or both in one file.


## Demo

Check out the app over on http://swello-book-list.herokuapp.com/


## Installation

*When on windows, make sure to have XAMPP installed and to have Apache and MySQL running.*

- Clone this repository into a directory with: `git clone https://github.com/SwelloLee/BookList`
- Afterwards rename the .env.example file from the root dir to .env and fill in the variables with your database information.
- Install composer if you havent already at your projects root directory with `composer install`.
- On your console, run `php artisan migrate:fresh --seed`.
- Finaly run `php artisan serve`.

Congratulations! 
The project can then be accessed at localhost:8000


## Notes

When running localy, make sure to replace 

`<link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">` 

with

`<link rel="stylesheet" href="{{ asset('css/app.css') }}">`

in the *app.blade.php* file located under */resources/views/layouts*
