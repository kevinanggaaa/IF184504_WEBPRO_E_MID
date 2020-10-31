<?php

namespace App\Http\Controllers;


use App\Exports\bookExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Models\BookCategory;
use App\Imports\bookImport;
use Illuminate\Http\Request;
use Session;

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

    public function exportExcel()
    {
        return Excel::download(new BookExport, 'book.xlsx');
    }

    public function importExcel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_transaction di dalam folder public
        $file->move('file_book', $nama_file);

        // import data
        Excel::import(new BookImport, public_path('/file_book/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Book import success!');

        // alihkan halaman kembali
        return redirect('/admin/books');
    }
}
