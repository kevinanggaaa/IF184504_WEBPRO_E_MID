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
                        <div class="form-group col-md-6">
                            <label for="book_id">Book Category</label>
                            <select id="book_id" name="book_id" class="form-control select2" value="{{ $transaction->book_id }}" style="width: 100%;">
                                @foreach ($books as $book)
                                <option value="{{$book->id}}">{{$book->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="date_issued">Date Issued</label>
                                <input type="date" name="date_issued" id="date_issued" value="{{ $transaction->date_issued }}" class="form-control {{$errors->has('date_issued') ? 'is-invalid' : ''}}" value="{{old('date_issued')}}" required>
                                @error('date_issued')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="date_due_for_return">Date Due For Return</label>
                                <input type="date" name="date_due_for_return" id="date_due_for_return" value="{{ $transaction->date_due_for_return }}" class="form-control {{$errors->has('date_due_for_return') ? 'is-invalid' : ''}}" value="{{old('date_due_for_return')}}" required>
                                @error('date_issued')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="date_return">Date Return</label>
                                <input type="date" name="date_return" id="date_return" value="{{ $transaction->date_return }}" class="form-control {{$errors->has('date_return') ? 'is-invalid' : ''}}" value="{{old('date_return')}}">
                                @error('date_issued')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
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