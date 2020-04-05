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
    <style>
        .counts {
            background: #d9534f;
            border-radius: 50%;
            color: #fff;
            font-size: 9px;
            font-weight: 700;
            float: right;
            height: 20px;
            width: 20px;
            line-height: 20px;
            text-align: center;
        }
        td {
            font-size: 13px;
        }

    </style>
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{$breadcrumb}}</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Subject</th>
                                <th>IP</th>
                                <th>User</th>
                                <th>Agent</th>
                                <th>Date & Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)

                            @foreach($logs as $content)
                                <tr>

                                    <td>{{$content->subject}}</td>
                                    <td>{{$content->ip}}</td>
                                    <td>{{$content->user_id}}</td>
                                    <td>{{Str::limit($content->agent, 10)}}</td>
                                    <td>{{$content->created_at}}</td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><



@endsection
