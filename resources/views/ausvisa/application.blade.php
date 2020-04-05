@extends('ausvisa.master')
@section('body')

    <section class="shop">
        <div class="azir-container">
            <div class="row">
                <div class="col-12 col-lg-4 col-xl-3">
                    <div class="services-detail_sidebar" id="sidebar">
                        <div class="sidebar_section">
                            <div class="our-services">
                                <h3 class="sidebar-title">WHY CHOOSE US?</h3>
                                <ul class="services-list">
                                    <li><a href="">100% Official Australian ETA Visa</a></li>
                                    <li><a href="">Apply In 5 Mins, Visa In Most Cases Within 15 Minutes (Instant ETA)</a></li>
                                    <li><a href="">Just RM20.00 MYR Per ETA & Money Back Guarantee</a></li>
                                    <li><a href="">24/7 Customer Service With Live Chat</a></li>
                                    <li><a href="">Ability to Process Up To 50 Persons In One Application</a></li>
                                    <li><a href="">Make A Mistake? We'll Amend For Free before approval.</a></li>

                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-12 col-lg-8 col-xl-9 ">
                    <div class="services-detail_contents">

                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="shop-checkout">
                             <form action="{{route('save-first-stage')}}" method="post" class="billing-detail_form">
                                 {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="first-name">I'm a Citizen of</label>
                                            <select name="registerCountry" id="visa_type" class="select-form" required="">
                                                <option style="color:#A5A5A5;" value="">Please select</option>
                                                @foreach($countries as $country)
                                                    <option  value="{{$country->slug}}">
                                                       {{$country->name}}
                                                    </option>
                                                    @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="last-name">I Want to Travel for
                                                *</label>
                                            <select name="visa_type" id="visa" class="select-form" required="">
                                                <option style="color:#A5A5A5;" value="">Please select</option>
                                                <option value="1">ETA (Tourist) Subclass 601-T</option>
                                                <option value="2">ETA (Business) Subclass 601-B</option>
                                                <option value="3">eVisitor ETA (Tourist) Subclass 651-T</option>
                                                <option value="4">eVisitor ETA (Business) Subclass 651-B</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="first-name">Number of Visitors</label>
                                            <select name="visaQuantity" id="visaQuantity" class="select-form" required="">
                                                <option style="color:#A5A5A5;" value="">Select...</option>
                                                <option value="1">01 - Visitor </option>
                                                <option value="2">02 - Visitors </option>
                                                <option value="3">03 - Visitors </option>
                                                <option value="4">04 - Visitors </option>
                                                <option value="5">05 - Visitors </option>
                                                <option value="6">06 - Visitors </option>
                                                <option value="7">07 - Visitors </option>
                                                <option value="8">08 - Visitors </option>
                                                <option value="9">09 - Visitors </option>
                                                <option value="10">10 - Visitors </option>
                                                <option value="11">11 - Visitors </option>
                                                <option value="12">12 - Visitors </option>
                                                <option value="13">13 - Visitors </option>
                                                <option value="14">14 - Visitors </option>
                                                <option value="15">15 - Visitors </option>
                                                <option value="16">16 - Visitors </option>
                                                <option value="17">17 - Visitors </option>
                                                <option value="18">18 - Visitors </option>
                                                <option value="19">19 - Visitors </option>
                                                <option value="20">20 - Visitors </option>
                                                <option value="21">21 - Visitors </option>
                                                <option value="22">22 - Visitors </option>
                                                <option value="23">23 - Visitors </option>
                                                <option value="24">24 - Visitors </option>
                                                <option value="25">25 - Visitors </option>
                                                <option value="26">26 - Visitors </option>
                                                <option value="27">27 - Visitors </option>
                                                <option value="28">28 - Visitors </option>
                                                <option value="29">29 - Visitors </option>
                                                <option value="30">30 - Visitors </option>
                                                <option value="31">31 - Visitors </option>
                                                <option value="32">32 - Visitors </option>
                                                <option value="33">33 - Visitors </option>
                                                <option value="34">34 - Visitors </option>
                                                <option value="35">35 - Visitors </option>
                                                <option value="36">36 - Visitors </option>
                                                <option value="37">37 - Visitors </option>
                                                <option value="38">38 - Visitors </option>
                                                <option value="39">39 - Visitors </option>
                                                <option value="40">40 - Visitors </option>
                                                <option value="41">41 - Visitors </option>
                                                <option value="42">42 - Visitors </option>
                                                <option value="43">43 - Visitors </option>
                                                <option value="44">44 - Visitors </option>
                                                <option value="45">45 - Visitors </option>
                                                <option value="46">46 - Visitors </option>
                                                <option value="47">47 - Visitors </option>
                                                <option value="48">48 - Visitors </option>
                                                <option value="49">49 - Visitors </option>
                                                <option value="50">50 - Visitors </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="last-name">Email Address
                                                *</label>
                                            <input class="input-form" name="email" type="text" required placeholder="Email Address">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="last-name">Phone Number
                                                *</label>
                                            <input class="input-form" name="phone" type="text" required placeholder="Context Number with Area Code">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group">
                                            <label for="last-name">Home Address
                                                *</label>
                                            <input class="input-form" name="address" type="text" required placeholder="Home Address">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">

                                            <input type="checkbox"  required id="customCheck1">
                                            <label>I agree with Terms & Conditions</label>

                                    </div>
                                    <div class="col-12 col-md-6">
                                        <button class="btn-blue" type="submit">Continue To Apply</button>
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
