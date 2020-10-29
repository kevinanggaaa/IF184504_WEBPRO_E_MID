<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        Book::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'publish_year' => $request['publish_year'],
            'author' => $request['author'],
            'publisher' => $request['publisher'],
            'category_id' => $request['category_id'],
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $Book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $Book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $Book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $Book->title = $request['title'];
        $Book->description = $request['description'];
        $Book->publish_year = $request['publish_year'];
        $Book->author = $request['author'];
        $Book->publisher = $request['publisher'];
        $Book->category_id = $request['category_id'];
        $Book->save();

        return redirect()->route('books.index')
            ->with('success', 'Book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $Book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $Book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book succesfully deleted');
    }
}
