<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Book;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test **/
    public function a_book_can_be_added_to_the_library()
    {
        $response = $this->post('/books',[
            'title' => 'Cool Book Title',
            'author' => 'Victor',
        ]);

        $response->assertOk();

        $this->assertCount(1, Book::all());

    }


    /** @test
    public function a_title_is_required(){

        $response = $this->post('/books',[
            'title' => '',
            'author' => 'Victor',
        ]);

        $response->assertSessionHasErrors('title');

    }**/


    /** @test **/
    public function a_book_can_be_updated(){
        $this->post('/books',[
            'title' => 'My Book Title',
            'author' => 'Victor',
        ]);

        $book = Book::first();

        $response = $this->patch('/books/'.$book->id, [
            'title' =>  'New Title',
            'author' => 'New Author'
        ]);

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('New Author' , Book::first()->author);
    }

}
