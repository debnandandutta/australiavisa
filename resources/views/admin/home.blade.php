@extends('admin.master')
@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Contents</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Process</th>
                                <th>Reference</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>Payment</th>
                                <th>Apply Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tiger Nixon</td>
                                <td><a class="text-primary" href="" target="_blank">ETA9056254</a></td>
                                <td>Edinburgh</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><



@endsection
