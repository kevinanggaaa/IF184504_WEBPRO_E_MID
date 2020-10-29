@extends('starbs.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transaction</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transactions</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="card">
    <div class="card-header">

        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('transactions.create') }}">Add Transactions</a>
            </div>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Book ID</th>
                    <th>Date Issued</th>
                    <th style="width: 280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->user_id }}</td>
                    <td>{{ $transaction->book_id }}</td>
                    <td>{{ $transaction->date_issued }}</td>
                    <td>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info" href="{{ route('transactions.show',$transaction->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('transactions.edit',$transaction->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection