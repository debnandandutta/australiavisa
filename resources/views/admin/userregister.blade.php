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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-11 ml-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Add</strong> Director
                    </div>

                    <form action="{{route('addUser')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">

                            {{ csrf_field() }}
                            <input type="hidden" name="publication_status"  value="1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name" > <strong>Full Name </strong></label>
                                        <input type="text" name="name" class="form-control" >

                                    </div>
                                    <div class="form-group">
                                        <label for="Username"><strong>Username </strong></label>
                                        <input type="text" name="username" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Password"><strong>Password </strong></label>
                                        <input type="password" name="password" class="form-control" >

                                    </div>
                                    <div class="form-group">
                                        <label for="cPassword"><strong>Confirm Password </strong></label>
                                        <input type="password" name="confirm-password" class="form-control" >

                                    </div>
                                    <div class="form-group">
                                        <label for="Designation"><strong>Designation </strong></label>
                                        <input type="text" name="designation" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Email"><strong>Email </strong></label>
                                        <input text="email" name="email" class="form-control" >

                                    </div>
                                    <div class="form-group">
                                        <label for="Mobile"><strong>Mobile </strong></label>
                                        <input type="text" name="mobile" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Status"><strong>Active Status </strong></label>
                                        <select name="isActive" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Type">User Type</label>
                                        <select name="isAdmin" class="form-control">
                                            <option value="1">Administrator</option>
                                            <option value="0">Admin</option>
                                        </select>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>name</th>
                                            <th>Role</th>
                                            <th>Controls</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                        @foreach($users as $user)
                                            <tr class="data-row">

                                                <td>{{$i++}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->isAdmin==1?'Administrator':'Admin'}} </td>

                                                <td>
                                                    <button  class="btn btn-danger btn-sm" data-toggle="modal"  id="getText" data-target="#deleterule" data-empid="{{$user->id}}" data-title="{{$user->name}}">
                                                        <i class="fa fa-trash"></i> </button>

                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>



                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Save
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>



@endsection
