<?php

namespace App\Http\Controllers;


use App\Exports\bookExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Models\BookCategory;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->only('create');
        $this->middleware('role:admin')->only('store');
        $this->middleware('role:admin')->only('edit');
        $this->middleware('role:admin')->only('update');
        $this->middleware('role:admin')->only('destroy');
    }

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
        $categories = BookCategory::all();

        return view('books.create', compact('categories'));
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
        $categories = BookCategory::all();

        return view('books.edit', compact('book', 'categories'));
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
        $book->title = $request['title'];
        $book->description = $request['description'];
        $book->publish_year = $request['publish_year'];
        $book->author = $request['author'];
        $book->publisher = $request['publisher'];
        $book->category_id = $request['category_id'];
        $book->save();

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
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book succesfully deleted');
    }

    public function export_excel()
	{
		return Excel::download(new bookExport, 'book.xlsx');
	}
}
