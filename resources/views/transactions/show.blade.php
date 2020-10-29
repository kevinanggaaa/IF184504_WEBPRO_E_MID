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
                    <li class="breadcrumb-item active">Transaction/li>
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
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="overview">

                        <table class="table">

                            <tbody>

                                <tr>
                                    <td>User ID</td>
                                    <td>{{ $transaction->user_id }}</td>
                                </tr>
                                <tr>
                                    <td>Book ID</td>
                                    <td>{{ $transaction->book_id }}</td>
                                </tr>
                                <tr>
                                    <td>Date Issued</td>
                                    <td>{{ $transaction->date_issued }}</td>
                                </tr>
                                <tr>
                                    <td>Date Due For Return</td>
                                    <td>{{ $transaction->date_due_for_return }}</td>
                                </tr>
                                <tr>
                                    <td>Date Return</td>
                                    <td>{{ $transaction->date_return }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.tab-pane -->
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