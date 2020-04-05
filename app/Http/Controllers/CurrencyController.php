<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    public function saveCurrency(Request $request){
        if($request->id>0)
            $currency = Currency::find($request->id);
        else
            $currency = new Currency();
        $currency->title = $request->currency_title;
        $currency->code = $request->currency_code;
        $currency->symbol = $request->currency_symbol;
        $currency->generalFees = $request->generalFees;
        $currency->standardFees = $request->standardFees;
        $currency->expressFees = $request->expressFees;
        $currency->instantFees = $request->instantFees;
        $currency->status = $request->status;
        $currency->save();

        return redirect('admins/currency')->with('status','Currency Saved Successfully');
    }
    public function manageCurrency(){

        $datas = DB::table('currencies')
            ->get();

        return view('admin.currency',[
            'currencies' => $datas
        ]);
    }
    public function deleteCurrency(Request $request){
        $currency = Currency::find($request->id);
        $currency->delete();

        return redirect('admins/currency')->with('status','Currency Deleted Successfully');
    }
}
