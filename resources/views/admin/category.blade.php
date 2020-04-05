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
                        <li class="active">Category</li>
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
                        <strong>Leave List</strong>

                    </div>
                    <div class="card-body card-block">

                        <button type="button" class="btn btn-primary btn-s" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i> Add Menu
                        </button>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Menu Postion</th>

                                <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($parentCats as $parent)
                                <tr class="data-row">

                                    <td>{{$i++}}</td>
                                    <td>{{$parent->name}}</td>
                                    <td>Parent</td>
                                    <td>{{$parent->top==1?'Top':''}} {{$parent->right==1?', right':''}} {{$parent->footer==1?', Footer':''}}</td>


                                    <td><button class="btn btn-info btn-sm modaledit" data-toggle="modal" id="getedit" data-target="#edit" data-title="{{$parent->name}}" data-parent="{{$parent->parent}}" data-top="{{$parent->top}}" data-left="{{$parent->right}}" data-footer="{{$parent->footer}}" data-editid="{{$parent->id}}"><i class="fa fa-edit"></i></button>
                                        <button  class="btn btn-danger btn-sm" data-toggle="modal"  id="getText" data-target="#deleterule" data-empid="{{$parent->id}}" data-title="{{$parent->name}}">
                                            <i class="fa fa-trash"></i> </button>

                                    </td>

                                </tr>
                            @endforeach
                            @foreach($categories as $category)
                                <tr class="data-row">

                                    <td>{{$i++}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->parentName}}</td>
                                    <td>{{$category->top==1?'Top':''}} {{$category->right==1?', Left':''}} {{$category->footer==1?', Footer':''}}</td>


                                    <td><button class="btn btn-info btn-sm modaledit" data-toggle="modal" id="getedit" data-target="#edit" data-title="{{$category->name}}" data-parent="{{$category->parent}}" data-top="{{$category->top}}" data-left="{{$category->right}}" data-footer="{{$category->footer}}" data-editid="{{$category->id}}"><i class="fa fa-edit"></i></button>
                                        <button  class="btn btn-danger btn-sm" data-toggle="modal"  id="getText" data-target="#deleterule" data-empid="{{$category->id}}" data-title="{{$category->name}}">
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
                <form action="{{ route('category.add') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="publication_status"  value="1">
                        <input type="hidden" name="display_type"  value="menu">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Category Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="category_name" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Parent Category</label></div>
                            <div class="col-12 col-md-9">
                                <select name="category_parent" required id="select" class="form-control" >
                                    <option value="0">--None--</option>
                                    @foreach($parentCats as $parent)
                                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Menu</label>
                            </div>
                            <div class="col-12 col-md-9">

                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="top_menu" value="1">Top
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="left_menu" value="1">Right
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="footer_menu" value="1" >Footer
                                        </label>
                                    </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleterule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('delete-category','test')}}" method="POST" class="remove-record-model">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5 >Sure To Delete</h5>
                        <div id="modal-name" ></div>

                        <input type="hidden" name="id" id="empId" value="">
                        <input type="hidden" name="name" id="name" value="">

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
            <form action="{{route('update-category')}}" method="POST" class="remove-record-model">


                {{csrf_field()}}
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" name="publication_status"  value="1">
                        <input type="hidden" class="form-control" name="id" id="editid" value="">
                        <input type="hidden" name="display_type"  value="menu">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Category Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="category_name" id="modal-name" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Parent Category</label></div>
                            <div class="col-12 col-md-9">
                                <select name="category_parent" required id="modal-parent" class="form-control" >
                                    <option value="0">--None--</option>
                                    @foreach($parentCats as $parent)
                                        <option value="{{$parent->id}}" >{{$parent->name}}</option>
                                    @endforeach
                                    <input type="hidden" readonly id="txtmanuid" >
                                </select>

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Menu</label>
                            </div>
                            <div class="col-12 col-md-9">

                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                       {{-- <input type="checkbox" class="form-check-input" name="top_menu" id="modal-top"  value="1">Top--}}
                                        <input type="checkbox" class="form-check-input" name="top_menu"  value="1">Top
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="left_menu"  value="1">Right
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="footer_menu"  value="1" >Footer
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
