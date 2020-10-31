@extends('starbs.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 text-xl">
                <h1>Book Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Book Category</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="card">
    @role('admin')
    <div class="card-header">
        <div class="card-tools">
            <div class="">
                <a class="btn btn-success" href="{{ route('bookCategories.create') }}">Add Book Category</a>
                <a href="{{route('bookCategories.exportExcel')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
            </div>
        </div>
    </div>
    @endrole

    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    @role('admin')
                    <th style="width: 280px">Action</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($bookCategories as $bookCategory)
                <tr>
                    <td>{{ $bookCategory->name }}</td>
                    @role('admin')
                    <td>
                        <form action="{{ route('bookCategories.destroy', $bookCategory->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('bookCategories.edit',$bookCategory->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    @endrole
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection