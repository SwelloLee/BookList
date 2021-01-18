<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BooksTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/add', $this->add_data());

        $this->assertDatabaseHas('books', [
            'title' => 'Test Book Title',
            'author' => 'Test Book Author'
        ]);

        //$this->assertCount(1, Book::all());
    }

    public function test_books_can_be_edited()
    {
        $this->withoutExceptionHandling();

        $this->post('/add', $this->add_data());

        $book = Book::find(1);

        $this->post('/edit', [
            'bookID' => $book->id,
            'title' => 'Test Book Title Edit',
            'author' => 'Test Book Author Edit',
        ]);

        $this->assertDatabaseHas('books', [
            'title' => 'Test Book Title Edit',
            'author' => 'Test Book Author Edit',
        ]);
    }

    public function test_books_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->post('/add', $this->add_data());

        $book = Book::find(1);

        $this->delete('/'.$book->id);

        $this->assertDeleted($book);
    }

    public function test_title_and_author_csv_file_can_be_downloaded()
    {
        $response = $this->post('/export', [
            'file' => 'csv',
            'list' => 'title-author'
        ]);

        $this->assertEquals('attachment; filename=Books-title-author.csv', $response->headers->get('content-disposition'));
    }

    public function test_title_csv_file_can_be_downloaded()
    {
        $response = $this->post('/export', [
            'file' => 'csv',
            'list' => 'title'
        ]);

        $this->assertEquals('attachment; filename=Books-title.csv', $response->headers->get('content-disposition'));
    }

    public function test_author_csv_file_can_be_downloaded()
    {
        $response = $this->post('/export', [
            'file' => 'csv',
            'list' => 'author'
        ]);

        $this->assertEquals('attachment; filename=Books-author.csv', $response->headers->get('content-disposition'));
    }

    public function test_title_and_author_xml_file_can_be_downloaded()
    {
        $response = $this->post('/export', [
            'file' => 'xml',
            'list' => 'title-author'
        ]);

        $this->assertEquals('attachment; filename=Books-title-author.xml', $response->headers->get('content-disposition'));
    }

    public function test_title_xml_file_can_be_downloaded()
    {
        $response = $this->post('/export', [
            'file' => 'xml',
            'list' => 'title'
        ]);

        $this->assertEquals('attachment; filename=Books-title.xml', $response->headers->get('content-disposition'));
    }

    public function test_author_xml_file_can_be_downloaded()
    {
        $response = $this->post('/export', [
            'file' => 'xml',
            'list' => 'author'
        ]);

        $this->assertEquals('attachment; filename=Books-author.xml', $response->headers->get('content-disposition'));
    }

    private function add_data()
    {
        return [
            'title' => 'Test Book Title',
            'author' => 'Test Book Author',
        ];
    }
}
