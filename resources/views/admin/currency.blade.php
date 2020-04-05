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
                        <li class="active">Currency Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <style>
        @media (min-width: 576px){
            .modal-dialog {
                max-width: 700px;
                margin: 1.75rem auto;
            }
        }


    </style>

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
                        <strong>Currency List</strong>

                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-s pull-right" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i> Add Currency
                        </button>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Flag</th>
                                <th>Symbol</th>
                                <th>General</th>
                                <th>Standard</th>
                                <th>Express</th>
                                <th>Instant</th>
                                <th>Controls</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($currencies as $currency)
                                <tr class="data-row">

                                    <td>{{$i++}}</td>
                                    <td>{{$currency->title}}</td>
                                    <td>{{$currency->code}}</td>
                                    <td>{{$currency->symbol}}</td>
                                    <td>{{$currency->generalFees}}</td>
                                    <td>{{$currency->standardFees}}</td>
                                    <td>{{$currency->expressFees}}</td>
                                    <td>{{$currency->instantFees}}</td>




                                    <td><button class="btn btn-info btn-sm modaledit"
                                                data-toggle="modal" id="getedit"
                                                data-target="#edit" data-editid="{{$currency->id}}"
                                                data-title="{{$currency->title}}" data-code="{{$currency->code}}" data-symbol="{{$currency->symbol}}"  data-general="{{$currency->generalFees}}"
                                                data-standard="{{$currency->standardFees}}" data-express="{{$currency->expressFees}}" data-instant="{{$currency->instantFees}}" data-status="{{$currency->status}}" ><i class="fa fa-edit"></i></button>
                                        <button  class="btn btn-danger btn-sm" data-toggle="modal"  id="getText" data-target="#deleterule" data-empid="{{$currency->id}}" data-title="{{$currency->title}}">
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
                <form action="{{ route('add-currency') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Currency</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="text-input" class=" form-control-label"> Title</label>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <input type="text" id="text-input" name="currency_title" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="text-input" class=" form-control-label">General Fees</label>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <input type="text" id="text-input" name="generalFees" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="text-input" class=" form-control-label"> Code</label>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <input type="text" id="text-input" name="currency_code" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="text-input" class=" form-control-label">Standard Fees</label>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <input type="text" id="text-input" name="standardFees" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="text-input" class=" form-control-label">Symbol</label>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <input type="text" id="text-input" name="currency_symbol" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="text-input" class=" form-control-label">Express Fees</label>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <input type="text" id="text-input" name="expressFees" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="text-input" class=" form-control-label"> Status</label>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <select name="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">InActive</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="text-input" class=" form-control-label">Instant Fees</label>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <input type="text" id="text-input" name="instantFees" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary"> Save Currency</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleterule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('delete-currency','test')}}" method="POST" class="remove-record-model">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Currency</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5 >Sure To Delete</h5>
                        <div id="modal-name" ></div>

                        <input type="hidden" name="id" id="empId" value="">

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
            <form action="{{route('add-currency')}}" method="POST" class="remove-record-model">


                {{csrf_field()}}
                <div class="modal-content">
                    <form action="{{ route('add-currency') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Currency</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="editid" value="">

                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="text-input" class=" form-control-label"> Title</label>
                                        </div>
                                        <div class="col-10 col-md-6">
                                            <input type="text" id="modal-name"
                                                   name="currency_title" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="text-input" class=" form-control-label">General Fees</label>
                                        </div>
                                        <div class="col-10 col-md-6">
                                            <input type="text" id="modal-general" name="generalFees" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="text-input" class=" form-control-label"> Code</label>
                                        </div>
                                        <div class="col-10 col-md-6">
                                            <input type="text" id="modal-code"
                                                   name="currency_code" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="text-input" class=" form-control-label">Standard Fees</label>
                                        </div>
                                        <div class="col-10 col-md-6">
                                            <input type="text" id="modal-standard"
                                                   name="standardFees" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="text-input" class=" form-control-label">Symbol</label>
                                        </div>
                                        <div class="col-10 col-md-6">
                                            <input type="text" id="modal-symbol"
                                                   name="currency_symbol" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="text-input" class=" form-control-label">Express Fees</label>
                                        </div>
                                        <div class="col-10 col-md-6">
                                            <input type="text" id="modal-express"
                                                   name="expressFees" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="text-input" class=" form-control-label"> Status</label>
                                        </div>
                                        <div class="col-10 col-md-6">
                                            <select name="status" id="modal-status" class="form-control">
                                                <option value="active" >Active</option>
                                                <option value="inactive" >InActive</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="row form-group">
                                        <div class="col col-md-6">
                                            <label for="text-input" class=" form-control-label">Instant Fees</label>
                                        </div>
                                        <div class="col-10 col-md-6">
                                            <input type="text" id="modal-instant" name="instantFees" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save Currency</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>





@endsection
