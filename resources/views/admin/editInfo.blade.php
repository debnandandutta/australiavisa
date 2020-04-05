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
                        <li class="active">Basic Information</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <strong>Basic Form</strong> Elements
                    </div>
                    <form action="{{route('basic-info-update')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">

                            {{ csrf_field() }}
                            <input type="hidden" name="id"  value="{{$basicInfos->id}}">
                            <input type="hidden" name="publication_status"  value="1">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Logo</label></div>
                                <div class="col-12 col-md-9">
                                    <img  alt="Select File" title="Select File" src="{{ URL::asset('/images/uploads/'.$basicInfos->logo) }}" style="cursor: pointer" height="100" width="100" />
                                    <br />
                                  <input type="file"  id="file-input" name="logo" class="form-control-file">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Company Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="company_name" class="form-control" value="{{$basicInfos->company_name}}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">About</label></div>
                                <div class="col-12 col-md-9"><textarea id="mytextarea" name="about"  rows="9"  class="form-control">
                                    {{$basicInfos->about}}
                                    </textarea></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Address</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="address" class="form-control" value="{{$basicInfos->address}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label" >Phone</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="phone" class="form-control" value="{{$basicInfos->phone}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="email" class="form-control" value="{{$basicInfos->email}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Fax</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="fax" class="form-control" value="{{$basicInfos->fax}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Facebook</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="facebook" class="form-control" value="{{$basicInfos->facebook}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tweeter</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="tweeter" class="form-control" value="{{$basicInfos->tweeter}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Google Plus</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="googleplus" class="form-control" value="{{$basicInfos->googleplus}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Linkdin</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="linkdin" class="form-control" value="{{$basicInfos->linkdin}}">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update
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
