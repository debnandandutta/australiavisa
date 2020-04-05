<?php

namespace App\Http\Controllers;


use App\PaymentGateSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentGateSettingController extends Controller
{
    public function index(){
        $paymentInfos = PaymentGateSetting::all()->first();

            return view('admin.payment-settings',[
                'paymentInfos' => $paymentInfos
            ]);

    }
    public function saveInfo(Request $request){
        $this->validate($request,[

            'senangpay_merchant_id'=>'required',
            'senangpay_secret_id'=>'required',

        ]);
        if($request->status<1)
        $content = new PaymentGateSetting();
        else
        $content = PaymentGateSetting::find($request->status);

        $content->paypal_id = $request->paypal_id;
        $content->senangpay_merchant_id = $request->senangpay_merchant_id;
        $content->senangpay_secret_id = $request->senangpay_secret_id;
        $content->service_tax = $request->service_tax;

        $content->save();


        return redirect('admins');
    }


}
