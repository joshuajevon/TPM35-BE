<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show(){
        $books = Book::all();
        return view('welcome', compact('books'));
        // compact -> passing data
    }

    public function create(){
        $categories = Category::all();
        return view('createBook', compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3',
            'author' => 'required|max:15',
            'publication_date' => 'required|date',
            'stock' => 'required|gt:10',
            'image' => 'required|mimes:png,jpg'
        ]);

        $fileName = $request->title . '-' . $request->author . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('/public/image',$fileName);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publication_date' => $request->publication_date,
            'stock' => $request->stock,
            'image' => $fileName,
            'category_id' => $request->category_name
        ]);

        //nama atribut => $request->name dari input form
        return redirect(route('show'));
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('editBook', compact('book'));
    }

    public function update(Request $request, $id){
        $book = Book::findOrFail($id);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publication_date' => $request->publication_date,
            'stock' => $request->stock
        ]);
        return redirect(route('show'));
    }

    public function delete($id){
        Book::destroy($id);
        return redirect(route('show'));
    }
}
