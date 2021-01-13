<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class BooksExport implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    private $list;

    public function __construct(string $list)
    {
        $this->list = $list;
    }

    public function query()
    {
        if($this->list == 'title'){
            return Book::query()->select('title');
        }else if($this->list == 'author'){
            return Book::query()->select('author');
        }else if($this->list == 'titleauth'){
            return Book::query()->select('title','author');
        }
    }
}
