@extends('admin.mastertwo')
@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h1>Referrence Id - {{$firstStageDetails[0]->reference_number}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">{{isset($status)?$status:"pending"}} Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<style>
    .card-body {
        padding: 0.25rem;
    }
    .table td, .table th {
        padding: .35rem;
    }
    .btn{
        width: 90%;
    }
    .dot {
        height: 42px;
        width: 42px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
    }
    .button5 {border-radius: 50%;}
    .table td, .table th {
        padding: 0.25rem;
    }
   .visitors tbody{
        display:block;
        overflow:auto;
        height:550px;
        width:100%;
    }
</style>
    <div class="animated fadeIn">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-9">

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Visitors</strong>
                            </div>
                            <div class="card-body visitors">
                                <table class="table table-striped">
                                    <tbody>
                                    @php($i=1)
                                    @foreach($firstStageDetails as $data)
                                    <tr>
                                        <td scope="col"> {!! \App\Http\Controllers\ApplicationController::getApplicantNameAppconfig
                  ($data->personal_id,$i,$data->group_id,$data->personal_id, isset($data->status)?$data->status:0)
                                         !!}
                                                @php($i++)</td><td>
                                            @if($data->personal_id ==$applicant)
                                                <button  class="btn btn-danger btn-sm" data-toggle="modal"  id="getText" data-target="#deleterule"
                                                         data-empid="{{$data->id}}" data-ref="{{$data->reference_number}}" data-title="{{$data->personal_id}}">
                                                    <i class="fa fa-trash"></i> </button>
                                                @endif </td> </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" scope="col">

                                        </td>


                                    </tr>

                                    <tr style="background: #ffffff">
                                        <td class="m-3">
                                            <form action="{{route('admin-new-applicant')}}" method="post" enctype="multipart/form-data"
                                                  class="form-horizontal">
                                                {{ csrf_field() }}
                                                <input name="reference_number" type="hidden" value="{{$firstStageDetails[0]->reference_number}}" required >
                                                <input name="personal_id" type="hidden" value="{{$applicant}}" required >
                                                <input name="group_id" type="hidden" value="{{$group}}" required >
                                                <input name="registerCountry" type="hidden" value="{{$firstStageDetails[0]->country}}" required >
                                                <input name="email" type="hidden" value="{{$firstStageDetails[0]->email}}" required >
                                                <input name="phone" type="hidden" value="{{$firstStageDetails[0]->phone}}" required >
                                                <input name="address" type="hidden" value="{{$firstStageDetails[0]->address}}" required >
                                                <input name="visa_type" type="hidden" value="{{$firstStageDetails[0]->visa_type}}" required >
                                            <button type="submit" class="button button5" title="Add Applicant">
                                                                            <i class="fa fa-plus m-1"></i>
                                                                 </button>

                                            </form>

                                        </td>


                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <form action="{{route('admin-save-second-stage')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="personal" type="hidden" value="{{$applicant}}" required >
                    <input name="group" type="hidden" value="{{$group}}" required >
                    <input name="reference_number" type="hidden" value="{{$firstStageDetails[0]->reference_number}}" required >
                    <input name="status" type="hidden" value="{{isset($informations[0])?isset($informations[0]):0}}"  >

                    <div class="col-lg-9 mr-0">
                        <div class="row text-center">
                            <div class="col-lg-12">
                                <span class="text-primary">{{isset($informations[0])?$informations[0]->updated_at:''}} </span>||
                                <span class="text-warning">{{$status}}</span>||
                                <span>Agent: {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 p-0">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title text-warning">
                                            {{isset($firstStageDetails[0])&&$firstStageDetails[0]->visa_type==1?'ETA (Tourist) Subclass 601-T':''}}
                                            {{isset($firstStageDetails[0])&&$firstStageDetails[0]->visa_type==2?'ETA (Business) Subclass 601-B':''}}
                                            {{isset($firstStageDetails[0])&&$firstStageDetails[0]->visa_type==3?'eVisitor ETA (Tourist) Subclass 651-T':''}}
                                            {{isset($firstStageDetails[0])&&$firstStageDetails[0]->visa_type==4?'eVisitor ETA (Tourist) Subclass 651-B':''}}
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <tbody>

                                            <tr>
                                                <td scope="col">Full Name</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td scope="col">
                                                    <input class="form-control" name="full_name" type="text" required value="{{isset($informations[0])
                                            ?$informations[0]->full_name:''}}">
                                                </td>

                                            </tr>


                                            <tr>
                                                <td scope="row">Family/Surname</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td><input class="form-control" name="sir_name" type="text" required value="{{isset($informations[0])
                                            ?$informations[0]->sir_name:''}}"></td>

                                            </tr>
                                            <tr>
                                                <td scope="row">First Name </td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td><input class="form-control" name="first_name" type="text" required value="{{isset($informations[0])
                                            ?$informations[0]->first_name:''}}"></td>

                                            </tr>
                                            <tr>
                                                <td scope="row">Gender </td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td> <select name="gender" id="gender" required="" style="" class="form-control">
                                                        <option value="" selected="">[ CHOOSE ]</option><option {{isset($informations[0])&& $informations[0]->gender=='Male'?'selected':''}} value="Male">Male</option>
                                                        <option {{isset($informations[0])&& $informations[0]->gender=='Female'?'selected':''}} value="Female">Female</option>										</select>

                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="row">Date of Birth </td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4 m-0 p-0">
                                                            <select name="dob_day" id="birthDay" required="" style="" class="form-control">
                                                                <option value="" selected="">[DAY]</option>
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    @if($i<10)
                                                                        <option {{isset($informations[0])&& $informations[0]->dob_day=="0".$i?'selected':''}} value="0{{ $i }}">0{{ $i }}</option>
                                                                    @else
                                                                        <option {{isset($informations[0])&& $informations[0]->dob_day==$i?'selected':''}} value="{{ $i }}">{{ $i }}</option>
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 m-0 p-0">
                                                            <select name="dob_month" id="birthMonth" required="" style="" class="form-control">
                                                                <option value="" selected="">[MONTH]</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='JAN'?'selected':''}} value="JAN">January</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='FEB'?'selected':''}} value="FEB">February</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='MAR'?'selected':''}} value="MAR">March</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='APR'?'selected':''}} value="APR">April</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='MAY'?'selected':''}} value="MAY">May</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='JUN'?'selected':''}} value="JUN">June</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='JUL'?'selected':''}} value="JUL">July</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='AUG'?'selected':''}} value="AUG">August</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='SEP'?'selected':''}} value="SEP">September</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='OCT'?'selected':''}} value="OCT">October</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='NOV'?'selected':''}} value="NOV">November</option>
                                                                <option {{isset($informations[0])&& $informations[0]->dob_month=='DEC'?'selected':''}} value="DEC">December</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 m-0 p-0">
                                                            <select name="dob_year" id="birthYear" required="" style="" class="form-control">
                                                                <option value="" selected="">[YEAR]</option>
                                                                @foreach($dobyears as $dobyear)
                                                                    <option  {{isset($informations[0])&& $informations[0]->dob_year==$dobyear?'selected':''}} value="{{$dobyear}}">
                                                                        {{$dobyear}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="row">Country Of Birth  </td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td>
                                                    <select name="country_of_birth" id="registerCountry" class="form-control" required="">
                                                        <option style="color:#A5A5A5;" value="">Please select</option>

                                                        @foreach($countries as $country)
                                                            @if(isset($informations[0]))
                                                                <option   {{isset($informations[0])&& $informations[0]->country_of_birth==$country->slug?'selected':''}} value="{{$country->slug}}">
                                                                    {{$country->name}}
                                                                </option>
                                                            @else
                                                                <option   {{$firstStageDetails[0]->country ==$country->slug?'selected':''}} value="{{$country->slug}}">
                                                                {{$country->name}}

                                                            @endif

                                                        @endforeach
                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="row">Ever Change Passport? </td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td>

                                                    <select name="change_of_passport" required id="select" class="form-control" >
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="row">Ctizen of other </td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td>

                                                    <select name="another_passport" required id="select" class="form-control" >
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="row">Criminal Activity</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td>
                                                    <select name="criminal_conviction" required id="select" class="form-control" >
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="col">Passport Number</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td scope="col">
                                                    <input class="form-control" name="passport_number" type="text" required placeholder="Context Number with Area Code" value="{{isset($informations[0])?$informations[0]->passport_number:''}}">
                                                </td>


                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 p-1">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Stripped Table</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <td scope="col">Nationality</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td scope="col">
                                                    {!! isset($informations[0])?\App\Http\Controllers\ApplicationController::getCountryCode
                                                    ($informations[0]->nationality):'' !!}

                                                </td>

                                                <td scope="col">
                                                    <select name="nationality" id="registerCountry" class="form-control" required="">
                                                        <option style="color:#A5A5A5;" value="">Please select</option>

                                                        @foreach($countries as $country)
                                                            @if(isset($informations[0]))
                                                                <option   {{isset($informations[0])&& $informations[0]->nationality==$country->slug?'selected':''}} value="{{$country->slug}}">
                                                                    {{$country->name}}
                                                                </option>
                                                            @else
                                                                <option   {{$firstStageDetails[0]->country ==$country->slug?'selected':''}} value="{{$country->slug}}">
                                                                {{$country->name}}

                                                            @endif

                                                        @endforeach

                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="col">Issuing Country</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td scope="col">
                                                    {!! isset($informations[0])?\App\Http\Controllers\ApplicationController::getCountryCode
                                                    ($informations[0]->passport_issue_country):'' !!}

                                                </td>

                                                <td scope="col">
                                                    <select name="passport_issue_country" id="registerCountry" class="form-control" required="">
                                                        <option style="color:#A5A5A5;" value="">Please select</option>
                                                        @foreach($countries as $country)
                                                            @if(isset($informations[0]))
                                                            <option   {{isset($informations[0])&& $informations[0]->passport_issue_country==$country->slug?'selected':''}} value="{{$country->slug}}">
                                                                {{$country->name}}
                                                            </option>
                                                            @else
                                                            <option   {{$firstStageDetails[0]->country ==$country->slug?'selected':''}} value="{{$country->slug}}">
                                                                {{$country->name}}

                                                        @endif

                                                        @endforeach

                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="col">Issuing Authrity</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td scope="col">
                                                    {!! isset($informations[0])?\App\Http\Controllers\ApplicationController::getCountryCode
                                                    ($informations[0]->passport_issue_authority) :''!!}
                                                </td>
                                                <td scope="col">
                                                    <select name="passport_issue_authority" id="registerCountry" class="form-control" required="">
                                                        <option style="color:#A5A5A5;" value="">Please select</option>

                                                        @foreach($countries as $country)
                                                            @if(isset($informations[0]))
                                                                <option   {{isset($informations[0])&& $informations[0]->passport_issue_authority==$country->slug?'selected':''}} value="{{$country->slug}}">
                                                                    {{$country->name}}
                                                                </option>
                                                            @else
                                                                <option   {{$firstStageDetails[0]->country ==$country->slug?'selected':''}} value="{{$country->slug}}">
                                                                {{$country->name}}

                                                            @endif

                                                        @endforeach

                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="col">Date of Issue</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td scope="col">
                                                    <select name="issue_day" id="birthDay" required="" style="" class="form-control mb-18">
                                                        <option value="" selected="">[DAY]</option>
                                                        @for ($i = 1; $i <= 31; $i++)
                                                            @if($i<10)
                                                                <option {{isset($informations[0])&& $informations[0]->issue_day=="0".$i?'selected':''}} value="0{{ $i }}">0{{ $i }}</option>
                                                            @else
                                                                <option {{isset($informations[0])&& $informations[0]->issue_day==$i?'selected':''}} value="{{ $i }}">{{ $i }}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td scope="col">
                                                    <div class="row">
                                                        <div class="col-md-6 m-0 p-0">
                                                            <select name="issue_month" id="birthMonth" required="" style="" class="form-control">
                                                                <option value="" selected="">[MONTH]</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='JAN'?'selected':''}} value="JAN">January</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='FEB'?'selected':''}} value="FEB">February</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='MAR'?'selected':''}} value="MAR">March</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='APR'?'selected':''}} value="APR">April</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='MAY'?'selected':''}} value="MAY">May</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='JUN'?'selected':''}} value="JUN">June</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='JUL'?'selected':''}} value="JUL">July</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='AUG'?'selected':''}} value="AUG">August</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='SEP'?'selected':''}} value="SEP">September</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='OCT'?'selected':''}} value="OCT">October</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='NOV'?'selected':''}} value="NOV">November</option>
                                                                <option {{isset($informations[0])&& $informations[0]->issue_month=='DEC'?'selected':''}} value="DEC">December</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 m-0 p-0 pr-1">
                                                            <select name="issue_year" id="birthDay" required="" style="" class="form-control">
                                                                <option value="" selected="">[YEAR]</option>


                                                                @foreach($years as $year)
                                                                    <option  {{isset($informations[0])&& $informations[0]->issue_year==$year?'selected':''}} value="{{$year}}">
                                                                        {{$year}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="col">Expiry Date</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td scope="col">
                                                    <select name="expiry_day" id="birthDay" required="" style="" class="form-control">
                                                        <option value="" selected="">[DAY]</option>
                                                        @for ($i = 1; $i <= 31; $i++)
                                                            @if($i<10)
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_day=="0".$i?'selected':''}} value="0{{ $i }}">0{{ $i }}</option>
                                                            @else
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_day==$i?'selected':''}} value="{{ $i }}">{{ $i }}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td scope="col">
                                                    <div class="row">
                                                        <div class="col-md-6 m-0 p-0">
                                                            <select name="expiry_month" id="birthMonth" required="" style="" class="form-control">
                                                                <option value="" selected="">[MONTH]</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='JAN'?'selected':''}} value="JAN">January</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='FEB'?'selected':''}} value="FEB">February</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='MAR'?'selected':''}} value="MAR">March</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='APR'?'selected':''}} value="APR">April</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='MAY'?'selected':''}} value="MAY">May</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='JUN'?'selected':''}} value="JUN">June</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='JUL'?'selected':''}} value="JUL">July</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='AUG'?'selected':''}} value="AUG">August</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='SEP'?'selected':''}} value="SEP">September</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='OCT'?'selected':''}} value="OCT">October</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='NOV'?'selected':''}} value="NOV">November</option>
                                                                <option {{isset($informations[0])&& $informations[0]->expiry_month=='DEC'?'selected':''}} value="DEC">December</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 m-0 p-0 pr-1">
                                                            <select name="expiry_year" id="birthYear" required="" style="" class="form-control">
                                                                <option value="" selected="">[YEAR]</option>
                                                                @foreach($byears as $byear)
                                                                    <option  {{isset($informations[0])&& $informations[0]->expiry_year==$byear?'selected':''}} value="{{$byear}}">
                                                                        {{$byear}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="col">NID</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td colspan="2" scope="col">
                                                    <input type="text" class="form-control" required name="identity_number" style="text-transform:uppercase;"
                                                           value="{{isset($informations[0])?$informations[0]->identity_number:''}}"
                                                           placeholder="i.e (i/c number or birth certificate or identity number )">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td colspan="3" scope="col">Contact Address</td>

                                                <td scope="col"><i class="fa fa-check"></i></td>

                                            </tr>
                                            <tr>
                                                <td colspan="4" scope="col">
                                                    <input class="form-control" name="address" type="text" required value="{{isset($firstStageDetails[0])?$firstStageDetails[0]->address:''}}">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td scope="col">Payment<i class="fa fa-check"></i></td>
                                                <td scope="col">65</td>
                                                <td scope="col">T-ID<i class="fa fa-check"></i></td>
                                                <td scope="col">RA897129837</td>

                                            </tr>
                                            <tr>
                                                <td scope="col">Email</td>
                                                <td scope="col"><i class="fa fa-check"></i></td>
                                                <td colspan="2" scope="col">
                                                    <input class="form-control" name="email" type="text" disabled required value="{{isset($firstStageDetails[0])
                                                ?$firstStageDetails[0]->email:''}}">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <button type="submit" class="btn btn-success btn-s btn-round">
                                                        <i class="fa fa-dot-circle-o"></i> Update Application
                                                    </button>
                                                </td>
                                            </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            @if(isset($informations[0])&&isset($informations[0]->passport_number))
             <div class="col-lg-3">
                    <div class="card mr-2">
                        <form action="{{route('edit-status-visafile-notify')}}" method="post"
                              enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <input name="personal" type="hidden" value="{{$applicant}}" required >
                            <input name="group" type="hidden" value="{{$group}}" required >

                            <input name="reference" type="hidden" value="{{$firstStageDetails[0]->reference_number}}"
                                   required >
                            <input name="passport" type="hidden" value="{{isset($informations[0])?$informations[0]->passport_number:''}}" required >

                            <div class="card-body card-block">


                                <div class="row form-group mb-0">
                                    <div class="col col-md-4"><label for="select" class=" form-control-label">Change Status</label></div>
                                    <div class="col-12 col-md-8">
                                        <select name="status" id="select" class="form-control">


           <option value="1" {{isset($informations[0])&& $informations[0]->status==1?'selected':''}}>Pending</option>
           <option value="4" {{isset($informations[0])&& $informations[0]->status==4?'selected':''}}>On Hold</option>
           <option value="2" {{isset($informations[0])&& $informations[0]->status==2?'selected':''}}>Processing</option>
           <option value="3" {{isset($informations[0])&& $informations[0]->status==3?'selected':''}}>Approved</option>

           <option value="5" {{isset($informations[0])&& $informations[0]->status==5?'selected':''}}>Rejected</option>
           <option value="6" {{isset($informations[0])&& $informations[0]->status==6?'selected':''}}>Delivered</option>
           <option value="7" {{isset($informations[0])&& $informations[0]->status==7?'selected':''}}>Canceled</option>
           <option value="8" {{isset($informations[0])&& $informations[0]->status==8?'selected':''}}>Currently In
               Australia</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">


                                    </div>
                                    <div class="col-12 col-md-8">
                                        @if(isset($thisApplicant)&&isset($thisApplicant->visa_file))
                                        <a href="{{isset($thisApplicant)&&isset($thisApplicant->visa_file)
                                ?URL::asset('/images/uploads/'.$thisApplicant->visa_file):''}}" target="_blank"><strong
                                                class="card-title text-warning"> <i
                                                    class="fa fa-file"></i> Click to
                                                View Visa File</strong></a>
                                            @endif
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4"><label for="file-input" class=" form-control-label">Visa File </label></div>
                                    <div class="col-12 col-md-8">
                                        <input type="file" id="file-input"
                                                                        name="visafile" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4"><label for="select" class=" form-control-label">Notify</label></div>
                                    <div class="col-12 col-md-8">
                                        <select name="notify" id="select" class="form-control">

                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-12 col-md-12">
                                        <button type="submit" class="btn btn-primary btn-s btn-round">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>

                                    </div>
                                </div>



                        </div>
                        </form>
                    </div>
                    <div class="card">

                        <div class="card-body card-block">

                            <form action="{{route('edit-visa-payment-notify')}}" method="post"
                                  enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <input name="personal" type="hidden" value="{{$applicant}}" required >
                                <input name="group" type="hidden" value="{{$group}}" required >
                                <input name="msg" type="hidden" value="Admin Upload" required >
                                <input name="reference" type="hidden" value="{{$firstStageDetails[0]->reference_number}}" required >
                                <input name="passport" type="hidden" value="{{isset($informations[0])?$informations[0]->passport_number:''}}" required >


                                <div class="row">
                                    <div class="col col-md-4"><label for="select" class=" form-control-label">Service</label></div>
                                    <div class="col-12 col-md-4">
                                        <label for="select" class=" form-control-label">Lock</label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="select" class=" form-control-label">Payment</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-4">
                                        <select name="service_type" id="select" class="form-control">

                                            <option value="GENERAL" {{isset($paymentHistory)&& $paymentHistory->service_type=='GENERAL'?'selected':''}}>General</option>
                                            <option value="STANDARD" {{isset($paymentHistory)&& $paymentHistory->service_type=='STANDARD'?'selected':''}}>Standard</option>
                                            <option value="EXPRESS" {{isset($paymentHistory)&& $paymentHistory->service_type=='EXPRESS'?'selected':''}}>Express</option>
                                            <option value="INSTANT" {{isset($paymentHistory)&& $paymentHistory->service_type=='INSTANT'?'selected':''}}>Instant</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <select name="lock" id="select" class="form-control">

                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <select name="status_id" id="select" class="form-control">

                                            <option value="0" {{isset($paymentHistory)&&
                                            $paymentHistory->status_id==0?'selected':''}}>Unpaid</option>
                                            <option value="2" {{isset($paymentHistory)&&
                                            $paymentHistory->status_id==2?'selected':''}}>Paid</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col col-md-1"><label for="select" class=" form-control-label">
                                            </label></div>

                                    <div class="col-12 col-md-11">
                                        <label for="select" class=" form-control-label">
                                            @if(isset($paymentHistory)&&isset($paymentHistory->payment_reciept))
                                                <a href="{{isset($paymentHistory)&&isset($paymentHistory->payment_reciept)
                                ?URL::asset('/images/uploads/receipt/'.$paymentHistory->payment_reciept):''}}"
                                                   target="_blank"><strong
                                                        class="card-title text-warning"> <i
                                                            class="fa fa-file"></i> Click to
                                                        View Payment Receipt</strong></a>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col col-md-8"><label for="select" class=" form-control-label">Payment
                                            Receipt</label></div>

                                    <div class="col-12 col-md-4">
                                        <label for="select" class=" form-control-label">Notify</label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col col-md-8">
                                        <input type="file" id="file-input" name="receipt" class="form-control-file">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <input type="text" name="notify"  placeholder="0" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col col-md-8"><label for="select" class=" form-control-label">Email</label></div>

                                    <div class="col-12 col-md-4">
                                        <label for="select" class=" form-control-label">Dispute</label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col col-md-8">
                                        <input class="form-control" name="email" type="text" required value="{{isset($firstStageDetails[0])
                                                ?$firstStageDetails[0]->email:''}}">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <select name="dispute" id="select" class="form-control">

                                            <option value="No">No</option>
                                            <option value="No">Yes</option>

                                        </select>
                                    </div>
                                </div>



                                <div class="row">

                                    <div class="col-12 col-md-12">
                                        <button type="submit" class="btn btn-success btn-s btn-round">
                                            <i class="fa fa-dot-circle-o"></i> Update Payment History
                                        </button>

                                    </div>
                                </div>
                            </form>




                        </div>

                    </div>
                </div>
            @endif
        </div>

    </div>

<div class="modal fade" id="deleterule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('delete-applicant','test')}}" method="POST" class="remove-record-model">
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

                    <input type="hidden" name="id" id="empId" value="">
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
