<?php

namespace App\Http\Controllers;

use App\Exports\transactionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Transaction;
use App\Models\Book;
use App\Http\Requests\TransactionRequest;
use Illuminate\Support\Facades\Auth;
use App\Imports\transactionImport;
use Illuminate\Http\Request;
use Session;

class TransactionController extends Controller
{
    public function __construct()
    {
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
        $transactions = Transaction::all();

        return view('transactions.index', compact('transactions'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $books = Book::all();

        return view('transactions.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $user = Auth::user();

        Transaction::create([
            'user_id' => $user->id,
            'book_id' => $request['book_id'],
            'date_issued' => $request['date_issued'],
            'date_due_for_return' => $request['date_due_for_return'],
            'date_return' => $request['date_return'],
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transactions successfully added');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $books = Book::all();

        return view('transactions.edit', compact('transaction', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $user = Auth::user();

        $transaction->user_id = $user->id;
        $transaction->book_id = $request['book_id'];
        $transaction->date_issued = $request['date_issued'];
        $transaction->date_due_for_return = $request['date_due_for_return'];
        $transaction->date_return = $request['date_return'];
        $transaction->save();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction succesfully deleted');
    }

    public function exportExcel()
    {
        return Excel::download(new TransactionExport, 'transaction.xlsx');
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
        $file->move('file_transaction', $nama_file);

        // import data
        Excel::import(new TransactionImport, public_path('/file_transaction/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Transaction import success!');

        // alihkan halaman kembali
        return redirect('/admin/transactions');
    }
}
