<?php

namespace App\Http\Controllers;

use App\Exports\bookCategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BookCategory;
use App\Http\Requests\BookCategoryRequest;
use App\Imports\bookCategoryImport;
use Illuminate\Http\Request;
use Session;

class BookCategoryController extends Controller
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
        $bookCategories = BookCategory::all();

        return view('bookCategories.index', compact('bookCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCategoryRequest $request)
    {
        BookCategory::create([
            'name' => $request['name'],
        ]);

        return redirect()->route('bookCategories.index')
            ->with('success', 'Data Book Category berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BookCategory $bookCategory)
    {
        return view('bookCategories.show', compact('bookCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BookCategory $bookCategory)
    {
        return view('bookCategories.edit', compact('bookCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function update(BookCategoryRequest $request, BookCategory $bookCategory)
    {
        $bookCategory->name = $request['name'];
        $bookCategory->save();

        return redirect()->route('bookCategories.index')
            ->with('success', 'Data Book Category berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookCategory $bookCategory)
    {
        $bookCategory->delete();

        return redirect()->route('bookCategories.index')
            ->with('success', 'Data Book Category berhasil dihapus');
    }


    public function exportExcel()
    {
        return Excel::download(new BookCategoryExport, 'bookCategory.xlsx');
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
        $file->move('file_book_category', $nama_file);

        // import data
        Excel::import(new BookCategoryImport, public_path('/file_book_category/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Book Category import success!');

        // alihkan halaman kembali
        return redirect('/admin/bookCategories');
    }
}
