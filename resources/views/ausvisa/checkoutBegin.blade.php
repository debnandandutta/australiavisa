

@extends('ausvisa.master')
@section('body')
    <style>
        .radio-border {
            border: 1px solid #ddd;
            padding: 12px 10px 16px 10px;
        }
        .bigfont{
            font-size: 22px;
            color: #131313;
        }

        .service-box h2 {
            margin-bottom: 0px;
            text-transform: none;
        }

        h2, .h2 {
            font-size: 24px;
            line-height: 1.2;
            color: #213c79;
            font-weight: 300;
        }

        .service-box{border:1px solid #CFEA8A;border-radius:4px;padding:15px 0 7px 0; border-bottom:3px solid #97A8CD;background:#F6F7FE;}
        .service-row .active{border-bottom:3px solid #C4F105;background:#30539C;}
        .service-row .active h2, .service-row .active span, .service-row .active p{color:#fff!important;}
        .service-row .col-sm-6{padding:0 8px!important;}
        .service-row .col-sm-6 .service-box span{color:#777;}
        .service-box h2{margin-bottom:0px;text-transform:none;}
        .service-box h2 span{font-weight:400;}
        .service-box h4{margin:5px 0;color:#FEC211;font-size:21px;}
        .service-box h4 span{color:#FC9212!important;font-size:29px;}
        .service-box p{margin:0;}
        .service-box small{font-size:22px!important;}
        .service-box:hover{border-bottom:3px solid #C4F105;opacity:0.7;cursor:pointer;}
        .table-2td tr td:nth-child(2){text-align:right!important;}
        th{text-align:right!important;}
        .paypal-btn{padding:2px 5px;border-radius:5px;background:#F6F7FE;}
        .mt-10 {
            margin-top: 10px!important;
        }
        .font-18 {
            font-size: 18px!important;
            padding: 10px 0 7px 20px!important;

        }
        .btn--rounded {
            border-radius: 5px !important;
        }
        .btn--yellow {
            color: #434343;
            background-color: #ffcd2c;
        }
        .btn--e1 {
            overflow: hidden;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            padding: 10px 84px 10px 50px;
            text-align: left;
        }
        .btn-2 {
            position: relative;
            display: inline-block;
            vertical-align: top;
            padding: 15px 67px 13px 67px;
            margin: 0;
            border: none;
            background-color: #eef0f9;
            font-size: 14px;
            color: #213c79;
            text-align: center;
            text-decoration: none !important;
            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
            cursor: pointer;
        }
    </style>
    <section class="shop">
        <div class="azir-container">
            <div class="row">
                <div class="col-12 col-lg-4 col-xl-3">
                    <div class="services-detail_sidebar" id="sidebar">
                        <div class="sidebar_section">
                            <div class="our-services">
                                <h3 class="sidebar-title">Check Out</h3>
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
                            <p class="text-center mb-15"><span class="bigfont">Application Summary</span></p>
                        <p class="p-16 mb-15">
                        Your Application is register under Reference Number <span class="bigfont">{{$firstStageDetails[0]->reference_number}}</span>.
                        -Make sure you note that reference as you will be ask to give it for all subsequent and steps
                        (Like : Check Visa Status, Print Visa and Further Verification).
                        </p>
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="shop-checkout">
                                    <div class="row service-row">
                                        <div class="col-12 col-md-6">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mt-10">
                                                    <div class="service-box"  style="opacity: 0.9;" id="servicedata-instant"  data-price="{{$serviceFees->instantFees}}"
                                                         data-service="INSTANT ETA @ 15 Minutes" data-service-2="INSTANT" data-person="{{count
                                                         ($firstStageDetails)}}" data-currency ="{{ Session::get('defaultCurrency') }}" data-charge="{{$paymentInfos->service_tax}}"
                                                         data-detail="{{$informations->reference_number." - ".$visa_type}}" data-order="{{$firstStageDetails[0]->reference_number}}">
                                                        <h2><span class="text-primary">INSTANT</span> ETA</h2>
                                                        <span>Receive Your Visa Within <i class="fa fa-history" aria-hidden="true"></i> <small>15</small> Minutes</span>
                                                        <h4><span> {{$serviceFees->symbol}} {{$serviceFees->instantFees}}</span>{{Session::get('defaultCurrency') }}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mt-10">
                                                    <div class="service-box" id="servicedata-express"  data-price="{{$serviceFees->expressFees}}" data-currency ="{{
                                                    Session::get('defaultCurrency') }}" data-service="EXPRESS ETA @ 60 Minutes" data-service-2="EXPRESS" data-person="{{count($firstStageDetails)}}" data-charge="{{$paymentInfos->service_tax}}" data-detail="{{$informations->reference_number." - ".$visa_type}}" data-order="{{$firstStageDetails[0]->reference_number}}">
                                                        <h2><span>EXPRESS</span> ETA</h2>
                                                        <span>Receive Your Visa Within <i class="fa fa-history" aria-hidden="true"></i> <small>60</small> Minutes
												</span>
                                                        <h4><span> {{$serviceFees->symbol}} {{$serviceFees->expressFees}}</span>{{Session::get('defaultCurrency') }}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mt-10">
                                                    <div class="service-box recommend active" id="servicedata-standard"  data-currency ="{{
                                                    Session::get('defaultCurrency') }}" data-price="{{$serviceFees->standardFees}}" data-service="STANDARD ETA @ 6 Hours" data-service-2="STANDARD" data-person="{{count($firstStageDetails)}}" data-charge="{{$paymentInfos->service_tax}}" data-detail="{{$informations->reference_number." - ".$visa_type}}" data-order="{{$firstStageDetails[0]->reference_number}}">
                                                        <h2><span>STANDARD</span> ETA</h2>
                                                        <span>
													Receive Your Visa Within <i class="fa fa-history" aria-hidden="true"></i> <small>06</small> Hours</span>
                                                        <h4><span> {{$serviceFees->symbol}} {{$serviceFees->standardFees}}</span>{{Session::get('defaultCurrency') }}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mt-10">
                                                    <div class="service-box" id="servicedata-general"  data-price="{{$serviceFees->generalFees}}"
                                                         data-currency ="{{Session::get('defaultCurrency') }}" data-service-2="GENERAL"data-service="GENERAL ETA @ 24 Hours" data-person="{{count($firstStageDetails)}}" data-charge="{{$paymentInfos->service_tax}}" data-detail="{{$informations->reference_number." - ".$visa_type}}" data-order="{{$firstStageDetails[0]->reference_number}}">
                                                        <h2><span>GENERAL</span> ETA</h2>
                                                        <span>Receive Your Visa Within <i class="fa fa-history" aria-hidden="true"></i>  <small>24</small> Hours
												</span>
                                                        <h4>
                                                            <span> {{$serviceFees->symbol}} {{$serviceFees->generalFees}}</span>
                                                            {{Session::get('defaultCurrency') }}												</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="place-order_box">
                                                <table>
                                                    <colgroup>
                                                        <col span="1" style="width: 30%; text-align: left">
                                                        <col span="1" style="width: 70%; text-align: right">
                                                    </colgroup>

                                                    <tbody>
                                                    <tr>
                                                        <td class="text-left">Reference Number :</td>
                                                        <td class="text-right reference">{{$firstStageDetails[0]->reference_number}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Visa Type :</td>
                                                        <td class="text-right visa-type">
                                                            {{$visa_type}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Requested Service  :</td>
                                                        <td class="text-right requested-service">EXPRESS ETA @ 60 Minutes</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Number of Visitors :</td>
                                                        <td class="text-right visa-type">{{count($firstStageDetails)}} Persons</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Service Fees :</td>
                                                        <td class="text-right">{{$serviceFees->symbol}} <span
                                                                class="unit-price">{{$serviceFees->standardFees}}</span> {{ Session::get('defaultCurrency') }} /Per Applicant</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Total Fees : :</td>
                                                        <td class="text-right visa-type product-price">{{$serviceFees->symbol}} {{count($firstStageDetails)*$serviceFees->standardFees}} {{ Session::get('defaultCurrency') }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Transaction Charge :{{$paymentInfos->service_tax}}</td>
                                                        <td class="text-right visa-transaction-charge">{{$serviceFees->symbol}} {{((count
                                                        ($firstStageDetails)*$serviceFees->standardFees)/100)*$paymentInfos->service_tax}} {{ Session::get
                                                        ('defaultCurrency') }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-left">Grand Total :</td>
                                                        <td class="text-right grand-total">RM {{(count($firstStageDetails)*$serviceFees->standardFees)+(count($firstStageDetails)*55)/100*($paymentInfos->service_tax)}} {{ Session::get('defaultCurrency') }}
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                <form name="orderSenangPay-STANDARD" method="post" action="https://app.senangpay.my/payment/{{$paymentInfos->senangpay_merchant_id}}">
                                                    <input type="hidden" name="detail" value="{{$informations->reference_number}}- {{$visa_type}}">

                                                    <input type="hidden" name="amount" id="grand-total-One" value="{{(count($firstStageDetails)*55)
                                                    +(count($firstStageDetails)*55)/100*($paymentInfos->service_tax)}}">
                                                    <input type="hidden" name="order_id" id="order-id" value="{{$informations->reference_number}} - STANDARD">
                                                    <input type="hidden" name="name" id="name" value="{{$informations->reference_number}}STANDARD">
                                                    <input type="hidden" name="email" value="{{$informations->email}}">
                                                    <input type="hidden" name="phone" value="{{$informations->phone}}">
                                                    <input type="hidden" name="hash" id ="hash" value="7a97eaac86f782dd377e8bf94bebee39">
                                                    <button type="submit" class="mt-10 col-sm-12 font-18 btn-2 btn--e1 btn--rounded">
                                                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                        <img onclick="this.form.submit();" src="{{asset('/ausvisa')}}/images/card-pay.png" alt="senangPay">
                                                    </button>
                                                </form>

                                                <a href="javascript:void(0);" class="mt-10 col-sm-12 font-18 btn-2 btn--e1 btn--rounded btn--yellow md-trigger" data-modal="rules_help">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                    PayBy Bank/Online Transfer <!--<font color="red">(off 4.4%)</font>-->
                                                </a>
                                                <a style="margin-top:14px;" href="https://www.australianvisa.com.my/my/aTRGHN/EscJkdK/eta-tourist-subclass-601-t?i=pv"
                                                   class="col-sm-12 font-18 place-order-btn btn-yellow">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                    Preview / Modify Application
                                                </a>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
