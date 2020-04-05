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
                    <li class="active">Page Content</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="animated fadeIn">
        <div class="row m-1">

            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Basic Form</strong> Elements
                        </div>
                        <form action="{{route('add-content')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">

                                {{ csrf_field() }}
                                <input type="hidden" name="publication_status"  value="1">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="select" id="display_type" class="form-control">
                                            <option value="">Please select</option>
                                            <option value="menu">Menu</option>
                                            <option value="insurance">Option 2</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group  {{ $errors->has('id') ? 'has-error' : '' }}">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category_id" id="city" class="form-control">
                                            <option value="">Please select</option>
                                            <option value="1">{{ trans('global.pleaseSelect') }}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Short Note</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="shortnote" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Content</label></div>
                                    <div class="col-12 col-md-9"><textarea id="mytextarea" name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                </div>



                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Featured Image</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="featured_image" class="form-control-file">
                                    </div>
                                </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                        </form>
                    </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>

@endsection
