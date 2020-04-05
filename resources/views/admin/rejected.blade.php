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
                                <th>ID</th>
                                <th>Stage</th>
                                <th>Reference</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>Payment</th>
                                <th>Apply Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)

                            @foreach($contents as $content)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Initial</td>
                                    <td><a class="text-primary" href="{{url('admins/rejected')
                                    }}/{{$content->reference_number}}"
                                           target="_blank">{{$content->reference_number}} <span
                                                class="counts">{{$content->count}}</span></a></td>
                                    <td>{{$content->country}}</td>
                                    <td>{{$content->email}}</td>
                                    <td>  <span class="text-success">UnPaid

                                        </span>
                                    </td>
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

    <div class="modal fade" id="deleterule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('delete-all-applicant','test')}}" method="POST" class="remove-record-model">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Applicant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5 >Sure To Delete</h5>
                        <div id="modal-name" ></div>


                        <input type="hidden" name="reference_number" id="ref" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-warning waves-effect remove-data-from-delete-form">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
