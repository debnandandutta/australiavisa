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
                        <strong>Add</strong> Director
                    </div>
                    <form action="{{route('save-diretor')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card-body card-block">

                            {{ csrf_field() }}
                            <input type="hidden" name="publication_status"  value="1">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="logo" class="form-control-file"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Director Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="company_name" class="form-control">
                                </div>
                            </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Designation</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="position" required id="select" class="form-control" >
                                    <option value="0">--None--</option>

                                        <option value="Chairman">Chairman</option>
                                        <option value="Director">Director</option>
                                        <option value="Member">Member</option>


                                </select>
                            </div>
                        </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">About</label></div>
                                <div class="col-12 col-md-9"><textarea id="mytextarea" name="about" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Address</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Phone</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Fax</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="fax" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Facebook</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="facebook" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tweeter</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="tweeter" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Google Plus</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="googleplus" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Linkdin</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="linkdin" class="form-control">
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
            <div class="col-lg-1"></div>
        </div>
    </div>

@endsection
