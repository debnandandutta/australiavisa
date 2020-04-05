

@extends('ausvisa.master')
@section('body')
<style>
    .radio-border {
        border: 1px solid #ddd;
        padding: 12px 10px 16px 10px;
    }
    input[type="text"] {
        -webkit-appearance: none;
        -webkit-border-radius: 0;
        text-transform: uppercase;}
</style>
    <section class="shop">
        <div class="azir-container">
            <div class="row">
                <div class="col-12 col-lg-4 col-xl-3">
                    <div class="services-detail_sidebar" id="sidebar">
                        <div class="sidebar_section">
                            <div class="our-services">
                                <h3 class="sidebar-title">Our Sevices</h3>
                                <ul class="services-list">
                                    @php($i=1)
                                    @foreach($firstStageDetails as $data)


                                                {!! \App\Http\Controllers\ApplicationController::getApplicantName($data->personal_id,$i,$data->group_id,$data->personal_id) !!}

                                    @php($i++)


                                    @endforeach

                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-12 col-lg-8 col-xl-9 ">
                    <div class="services-detail_contents">
                        <h1 class="text-center mb-25">Let's Start Your ETA Application</h1>
                        <p class="p-16 mb-15">
                            Please Provide the details requested exactly as they appear in your passport. For fill up the form if you need any help please click here  RULES / HELP   to view specific example and complete rules.</p>
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="shop-checkout">
                                    <form action="{{route('save-second-stage')}}" method="post" class="billing-detail_form">
                                        {{ csrf_field() }}
                                        <input name="personal" type="hidden" value="{{$applicant}}" required >
                                        <input name="group" type="hidden" value="{{$group}}" required >

                                        <input name="status" type="hidden" value="{{isset($informations[0])?$informations[0]->status:0}}"  >
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="last-name">Full Name (As Passport)
                                                        *</label>
                                                    <input class="input-form" name="full_name" type="text" required value="{{isset($informations[0])?$informations[0]->full_name:''}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="last-name">Surname / Family Name *
                                                        *</label>
                                                    <input class="input-form" name="sir_name" type="text" required value="{{isset($informations[0])?$informations[0]->sir_name:''}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="last-name">Given Name / First Name
                                                        *</label>
                                                    <input class="input-form" name="first_name" type="text" required value="{{isset($informations[0])?$informations[0]->first_name:''}}" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="last-name">Did you change your Passport name ever?
                                                        *</label>
                                                    <div class="form-group mb-5 radio-border">
                                                            <input type="radio" class="form-check-input" name="change_of_passport" value="1" {{isset($informations[0])&& $informations[0]->change_of_passport==1?'checked':''}}>Yes

                                                            <input type="radio" class="form-check-input" name="change_of_passport" value="0" {{isset($informations[0])&& $informations[0]->change_of_passport==0?'checked':''}}>No

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="first-name">Gender</label>
                                                    <select name="gender" id="gender" required="" style="" class="select-form mb-18">
                                                        <option value="" selected="">[ CHOOSE ]</option><option {{isset($informations[0])&& $informations[0]->gender=='Male'?'selected':''}} value="Male">Male</option>
                                                        <option {{isset($informations[0])&& $informations[0]->gender=='Female'?'selected':''}} value="Female">Female</option>										</select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name">Date of Birth *
                                                                </label>
                                                            <select name="dob_month" id="birthMonth" required="" style="" class="select-form mb-18">
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
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name"> &nbsp;
                                                                </label>
                                                            <select name="dob_day" id="birthDay" required="" style="" class="select-form mb-18">
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
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name">
                                                                &nbsp;</label>
                                                            <select name="dob_year" id="birthYear" required="" style="" class="select-form mb-18">
                                                                <option value="" selected="">[YEAR]</option>
                                                                @foreach($dobyears as $dobyear)
                                                                    <option  {{isset($informations[0])&& $informations[0]->dob_year==$dobyear?'selected':''}} value="{{$dobyear}}">
                                                                        {{$dobyear}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="first-name">Country of birth</label>
                                                    <select name="country_of_birth" id="registerCountry" class="select-form" required="">
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
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="first-name">Nationality</label>
                                                    <select name="nationality" id="registerCountry" class="select-form" required="">
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
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="last-name">Passport Number *
                                                        *</label>
                                                    <input class="input-form" name="passport_number" type="text" required placeholder="Context Number with Area Code" value="{{isset($informations[0])?$informations[0]->passport_number:''}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="first-name">Passport Issue Country *</label>
                                                    <select name="passport_issue_country" id="registerCountry" class="select-form" required="">
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
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="first-name">Passport Issue Authority *</label>
                                                    <select name="passport_issue_authority" id="registerCountry" class="select-form" required="">
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
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name">Issue Date *
                                                            </label>
                                                            <select name="issue_month" id="birthMonth" required="" style="" class="select-form mb-18">
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
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name"> &nbsp;
                                                            </label>
                                                            <select name="issue_day" id="birthDay" required="" style="" class="select-form mb-18">
                                                                <option value="" selected="">[DAY]</option>
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    @if($i<10)
                                                                        <option {{isset($informations[0])&& $informations[0]->issue_day=="0".$i?'selected':''}} value="0{{ $i }}">0{{ $i }}</option>
                                                                    @else
                                                                        <option {{isset($informations[0])&& $informations[0]->issue_day==$i?'selected':''}} value="{{ $i }}">{{ $i }}</option>
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name">
                                                                &nbsp;</label>
                                                            <select name="issue_year" id="birthDay" required="" style="" class="select-form mb-18">
                                                                <option value="" selected="">[YEAR]</option>


                                                                @foreach($years as $year)
                                                                    <option  {{isset($informations[0])&& $informations[0]->issue_year==$year?'selected':''}} value="{{$year}}">
                                                                        {{$year}}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name">Expiry Date  *
                                                            </label>
                                                            <select name="expiry_month" id="birthMonth" required="" style="" class="select-form mb-18">
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
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name"> &nbsp;
                                                            </label>
                                                            <select name="expiry_day" id="birthDay" required="" style="" class="select-form mb-18">
                                                                <option value="" selected="">[DAY]</option>
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    @if($i<10)
                                                                        <option {{isset($informations[0])&& $informations[0]->expiry_day=="0".$i?'selected':''}} value="0{{ $i }}">0{{ $i }}</option>
                                                                    @else
                                                                        <option {{isset($informations[0])&& $informations[0]->expiry_day==$i?'selected':''}} value="{{ $i }}">{{ $i }}</option>
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <label for="last-name">
                                                                &nbsp;</label>
                                                            <select name="expiry_year" id="birthYear" required="" style="" class="select-form mb-18">
                                                                <option value="" selected="">[YEAR]</option>
                                                                @foreach($byears as $byear)
                                                                    <option  {{isset($informations[0])&& $informations[0]->expiry_year==$byear?'selected':''}} value="{{$byear}}">
                                                                        {{$byear}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="last-name">Identity Number
                                                        *</label>
                                                    <input type="text" class="input-form" required name="identity_number" style="text-transform:uppercase;"
                                                           value="{{isset($informations[0])?$informations[0]->identity_number:''}}"
                                                           placeholder="i.e (i/c number or birth certificate or identity number )">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="last-name">Do you have passport of Another Country?
                                                        *</label>
                                                    <div class="form-group mb-5 radio-border">
                                                        <input type="radio" class="form-check-input" name="another_passport" value="1" {{isset($informations[0])&& $informations[0]->another_passport==1?'checked':''}}>Yes

                                                        <input type="radio" class="form-check-input" name="another_passport" value="0" {{isset($informations[0])&& $informations[0]->another_passport==0?'checked':''}}>No

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <label for="last-name">Do you have a criminal conviction?
                                                        *</label>
                                                    <div class="form-group mb-5 radio-border">
                                                        <input type="radio" class="form-check-input" name="criminal_conviction" value="1" {{isset($informations[0])&& $informations[0]->criminal_conviction==1?'checked':''}}>Yes

                                                        <input type="radio" class="form-check-input" name="criminal_conviction" value="0" {{isset($informations[0])&& $informations[0]->criminal_conviction==0?'checked':''}}>No

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">

                                                <button  class="btn-yellow font-18 text-uppercase" type="submit"><i class="fa fa-check-square" aria-hidden="true"></i>Save & Preview</button>

                                            </div>
                                            <div class="col-12 col-md-6">
                                                <button class="btn-blue-green font-18 text-uppercase" type="submit"><i class="fa fa-check-square" aria-hidden="true"></i>Save & Exit</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
