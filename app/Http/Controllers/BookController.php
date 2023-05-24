<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required'
        ]);

       $response = Book::create($data);

    }


    public function update(Book $book, Request $request){

        $book->update($request->all());

    }

}
