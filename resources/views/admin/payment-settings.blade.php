@extends('admin.master')
@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Payment Settings</li>
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

                    <form action="{{route('payment-info-add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body card-block">

                            {{ csrf_field() }}
                            <input type="hidden" name="status"  value="{{isset($paymentInfos)?$paymentInfos->id:''}}">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Value</th>
                                    <th>Example</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Paypal Id</td>
                                    <td><input type="text" id="text-input" name="paypal_id" class="form-control" value="{{isset($paymentInfos)?$paymentInfos->paypal_id:''}}"></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>SenangPay Merchant Id</td>
                                    <td><input type="text" id="text-input" name="senangpay_merchant_id" class="form-control" value="{{isset($paymentInfos)?$paymentInfos->senangpay_merchant_id:''}}"></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>SenangPay Secret Id</td>
                                    <td><input type="text" id="text-input" name="senangpay_secret_id" class="form-control" value="{{isset($paymentInfos)?$paymentInfos->senangpay_secret_id:''}}"></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Service Tax (Global)</td>
                                    <td><input type="text" id="text-input" name="service_tax" class="form-control" value="{{isset($paymentInfos)?$paymentInfos->service_tax:''}}"></td>
                                    <td></td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg pull-right">
                                <i class="fa fa-dot-circle-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>

@endsection
