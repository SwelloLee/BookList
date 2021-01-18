<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportBooksController extends Controller
{
    public function index()
    {
        return view('books.export');
    }

    public function export(Request $request)
    {

        $filename = 'Books-' . $request->list;

        if($request->file == 'csv'){
            return Excel::download(new BooksExport($request->list), $filename.'.csv');
        } else {

            $books = Book::all();

            $xml = new \XMLWriter();
            $xml->openMemory();
            $xml->setIndent(true);
            // Start a new document
            $xml->startDocument();
            // Start a element to put data in
            $xml->startElement('BookList');
            // Data what goes in your element\
            foreach ($books as $book) {
                $xml->startElement('Books');
                if($request->list == 'title' || $request->list == 'title-author' ){
                    $xml->writeAttribute('title', $book->title);
                }
                if($request->list == 'author' || $request->list == 'title-author' ){
                    $xml->writeAttribute('author', $book->author);
                }
                $xml->endElement();
            }

            $xml->endElement();
            $xml->endDocument();

            // You put the XML content in this variable
            $contents = $xml->outputMemory();
            // Reset XML just in case
            $xml = null;

            Storage::put($filename . '.xml',$contents);
            return Storage::download($filename . '.xml');
        }
    }
}
