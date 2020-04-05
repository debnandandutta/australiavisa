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
                        <li class="active">Country</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="animated fadeIn">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            @include('admin.includes.messages')
            <div class="col-lg-1"></div>
            <div class="col-lg-10">

                <div class="card" id="apps">
                    <div class="card-header">
                        <strong>Country List</strong>

                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-s pull-right" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i> Add Country
                        </button>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>Format</th>
                                <th>subclass_601_T</th>
                                <th>subclass_601_B</th>
                                <th>subclass_651_T</th>
                                <th>subclass_651_B</th>
                                <th>Controls</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($countries as $country)
                                <tr class="data-row">

                                    <td>{{$i++}}</td>
                                    <td>{{$country->name}}</td>
                                    <td>{{$country->shortFormat}}</td>
                                    <td>{{$country->subclass_601_T==1?'Yes':''}} </td>
                                    <td>{{$country->subclass_601_B==1?'Yes':''}} </td>
                                    <td>{{$country->subclass_651_T==1?'Yes':''}} </td>
                                    <td>{{$country->subclass_651_B==1?'Yes':''}} </td>



                                    <td><button class="btn btn-info btn-sm modaledit" data-toggle="modal" id="getedit" data-target="#edit" data-title="{{$country->name}}" data-short="{{$country->shortFormat}}"  data-editid="{{$country->id}}"><i class="fa fa-edit"></i></button>
                                        <button  class="btn btn-danger btn-sm" data-toggle="modal"  id="getText" data-target="#deleterule" data-empid="{{$country->id}}" data-title="{{$country->name}}">
                                            <i class="fa fa-trash"></i> </button>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- .animated -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('add-country') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="publication_status"  value="1">

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Country Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="country_name" required class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Short Format</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="shortFormat" required class="form-control">
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Visa Type</label>
                            </div>
                            <div class="col-12 col-md-9">

                                <div class="form-check">
                                    <label class="form-check-label">
                                        {{-- <input type="checkbox" class="form-check-input" name="top_menu" id="modal-top"  value="1">Top--}}
                                        <input type="checkbox" class="form-check-input" name="subclass_601_T"  value="1">ETA (Tourist) Subclass 601-T
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subclass_601_B"  value="1">ETA (Business) Subclass 601-B
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subclass_651_T"  value="1" >eVisitor ETA (Tourist) Subclass 651-T
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subclass_651_B"  value="1" >eVisitor ETA (Business) Subclass 651-B
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save Country</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleterule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('delete-country','test')}}" method="POST" class="remove-record-model">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Country</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5 >Sure To Delete</h5>
                        <div id="modal-name" ></div>

                        <input type="hidden" name="id" id="empId" value="">
                        <input type="hidden" name="country_name" id="name" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-warning waves-effect remove-data-from-delete-form">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('update-country')}}" method="POST" class="remove-record-model">


                {{csrf_field()}}
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Country</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" name="publication_status"  value="1">
                        <input type="hidden" class="form-control" name="id" id="editid" value="">

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Country Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="country_name" id="modal-name" required class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Short Format</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="modal-short" name="shortFormat" required class="form-control">
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Visa Type</label>
                            </div>
                            <div class="col-12 col-md-9">

                                <div class="form-check">
                                    <label class="form-check-label">
                                        {{-- <input type="checkbox" class="form-check-input" name="top_menu" id="modal-top"  value="1">Top--}}
                                        <input type="checkbox" class="form-check-input" name="subclass_601_T"  value="1">ETA (Tourist) Subclass 601-T
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subclass_601_B"  value="1">ETA (Business) Subclass 601-B
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subclass_651_T"  value="1" >eVisitor ETA (Tourist) Subclass 651-T
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subclass_651_B"  value="1" >eVisitor ETA (Business) Subclass 651-B
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-warning waves-effect remove-data-from-delete-form">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





@endsection
