@extends('starbs.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Transaction</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Edit Transaction</h3>
            </div>
            <form role="form" method="POST" action="{{ route('transactions.update',$transaction->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Insert user id" value="{{ $transaction->user_id }}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="book_id">Book ID</label>
                                <input type="text" class="form-control" id="book_id" name="book_id" placeholder="Insert book id" value="{{ $transaction->book_id }}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="date_issued">Date Issued</label>
                                <input type="text" class="form-control" id="date_issued" name="date_issued" placeholder="Insert date issued" value="{{ $transaction->date_issued }}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="date_due_for_return">Date Due For Return</label>
                                <input type="text" class="form-control" id="date_due_for_return" name="date_due_for_return" placeholder="Insert date due for return" value="{{ $transaction->date_due_for_return }}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="date_return">Date Return</label>
                                <input type="text" class="form-control" id="date_return" name="date_return" placeholder="Insert date return" value="{{ $transaction->date_return }}" required>
                            </div>
                        </div>
                    </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection