<?php

namespace App\Http\Controllers;

use App\Country;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{

    public function saveCountry(Request $request){
        $country = new Country();
        $country->name = $request->country_name;
        $country->shortFormat = $request->shortFormat;
        $country->slug = preg_replace('/\s+/', '-', strtolower($request->country_name));
        $country->subclass_601_T = $request->subclass_601_T;
        $country->subclass_601_B = $request->subclass_601_B;
        $country->subclass_651_T = $request->subclass_651_T;
        $country->subclass_651_B = $request->subclass_651_B;
        $country->publication_status = $request->publication_status;
        $country->save();
        LogActivity::addToLog('Country Added -'.$request->country_name);
        return redirect('admins/country')->with('status','Country Saved Successfully');
    }
    public function manageCountry(){

        $datas = DB::table('countries')
            ->get();

        return view('admin.country',[
            'countries' => $datas
        ]);
    }

    public function unpublishedCountry($id){
        $country = Country::find($id);
        $country->publication_status = 0;
        $country->save();

        return redirect('/country/manage');
    }



    public function publishedcountry($id){
        $country = Country::find($id);
        $country->publication_status = 1;
        $country->save();

        return redirect('/country');
    }

    public function editCountry($id){
        $country = Country::find($id);
        return view('edit-country',[
            'country' => $country
        ]);
    }

    public function updateCountry(Request $request){

        $country = Country::find($request->id);

        $country->name = $request->country_name;
        $country->shortFormat = $request->shortFormat;
        $country->slug = preg_replace('/\s+/', '-', strtolower($request->country_name));
        $country->subclass_601_T = $request->subclass_601_T;
        $country->subclass_601_B = $request->subclass_601_B;
        $country->subclass_651_T = $request->subclass_651_T;
        $country->subclass_651_B = $request->subclass_651_B;
        $country->publication_status = $request->publication_status;

        if($country->save()){
            LogActivity::addToLog('Country Updated'.$request->country_name);
            return redirect('/admins/country')->with('status','country Updated Successfully');
        }else{
            return "cant";
        } ;


    }

    public function deleteCountry(Request $request){
        $country = Country::find($request->id);
        $country->delete();
        LogActivity::addToLog('Country Deleted - '.$request->country_name);

        return redirect('/admins/country')->with('status','Country Deleted Successfully');
    }
    public function get_by_visa_type(Request $request)
    {
        if (!$request->visa_type) {
            $html = '<option value="">--Please Select Your Citizenship--</option>';
        } else {
            $html = '';
            $countries = Country::where('slug', $request->visa_type)->get();

            foreach ($countries as $country) {
                if($country->subclass_601_T==1){
                    $html .='<option value="1">ETA (Tourist) Subclass 601-T</option>';
                }
                if($country->subclass_601_B==1){
                    $html .='<option value="2">ETA (Business) Subclass 601-B</option>';
                }
                if($country->subclass_651_T==1){
                    $html .='<option value="3">eVisitor ETA (Tourist) Subclass 651-T</option>';
                }
                if($country->subclass_651_B==1){
                    $html .='<option value="4">eVisitor ETA (Business) Subclass 651-B</option>';
                }
            }
        }

        return response()->json(['html' => $html]);
    }

}
