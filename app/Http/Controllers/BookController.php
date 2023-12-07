<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show(){
        $books = Book::all();
        return view('welcome', compact('books'));
        // compact -> passing data
    }

    public function create(){
        return view('createBook');
    }

    public function store(Request $request){
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publication_date' => $request->publication_date,
            'stock' => $request->stock
        ]);

        //nama atribut => $request->name dari input form
        return redirect(route('show'));
    }
}
