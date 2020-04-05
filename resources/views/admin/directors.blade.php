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
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row m-1">
            @include('admin.includes.messages')


            <div class="col-lg-12">

                <div class="card" id="apps">
                    <div class="card-header">
                        <strong>Leave List</strong>

                    </div>
                    <div class="card-body card-block">
                        <a href="{{route('add-diretor')}}">
                            <button type="button" class="btn btn-primary btn-s" >
                                <i class="fa fa-plus"></i> Add Director
                            </button>
                        </a>

                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Postion</th>
                                <th>Phone</th>
                                <th>Email</th>

                                <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)

                            @foreach($contents as $content)
                                <tr class="data-row">

                                    <td class="align-middle">{{$i++}}</td>
                                    <td class="align-middle"><img  alt="{{$content->company_name}}" src="{{ URL::asset('/images/uploads/'.$content->logo) }}" style="cursor: pointer" height="70" width="70" /></td>
                                    <td class="align-middle">{{$content->company_name}}</td>
                                    <td class="align-middle">{{$content->position}}</td>
                                    <td class="align-middle">{{ $content->phone }}</td>
                                    <td class="align-middle">{{ $content->email }}</td>




                                    <td class="align-middle">
                                        <div class="btn-group">
                                            <form action="{{route('edit-director')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$content->id}}">
                                                <button class="btn btn-info btn-sm modaledit" title="Edit" data-toggle="modal" id="getedit" ><i class="fa fa-edit"></i></button>

                                            </form>
                                            <button  class="btn btn-danger btn-sm" data-toggle="modal"  id="getText" data-target="#deleterule" data-empid="{{$content->id}}" data-title="{{$content->name}}">
                                                <i class="fa fa-trash"></i> </button>
                                        </div>
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


    <div class="modal fade" id="deleterule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('delete-director','test')}}" method="POST" class="remove-record-model">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Content</h5>
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






@endsection