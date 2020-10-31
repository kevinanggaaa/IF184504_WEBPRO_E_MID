@extends('starbs.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Book</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Book</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-md-9">

        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="tab">Overview</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#description" data-toggle="tab">Description</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="overview">

                        <table class="table">

                            <tbody>

                                <tr>
                                    <td>Title</td>
                                    <td>{{ $book->title }}</td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>{{ $book->author }}</td>
                                </tr>
                                <tr>
                                    <td>Publish Year</td>
                                    <td>{{ $book->publish_year }}</td>
                                </tr>
                                <tr>
                                    <td>Publisher</td>
                                    <td>{{ $book->publisher }}</td>
                                </tr>
                                <tr>
                                    <td>Book Category</td>
                                    <td>{{ $book->bookCategory->name }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="description">
                        {{$book->description}}
                    </div>
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->

                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->

</div>
@endsection