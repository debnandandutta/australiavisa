<?php

namespace App\Http\Controllers;

use App\BasicInformation;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class BasicInformationController extends Controller
{
    public function index(){
        $basicInfos = BasicInformation::all()->first();
        if(is_null($basicInfos)) {
            return view('admin/information');
        }else{
            return view('admin/editInfo',[
                'basicInfos' => $basicInfos
            ]);
        }
    }
    public function saveInfo(Request $request){
        $this->validate($request,[

            'company_name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $content = new BasicInformation();
        $content->company_name = $request->company_name;
        $content->about = $request->about;
        $content->address = $request->address;
        $content->phone = $request->phone;
        $content->email = $request->email;
        $content->fax = $request->fax;
        $content->facebook = $request->facebook;
        $content->tweeter = $request->tweeter;
        $content->googleplus = $request->googleplus;
        $content->linkdin = $request->linkdin;
        $content->save();

        if($request->hasfile('logo')){
            $image = $request->file('logo');
            $img = 'logo'.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/uploads/'.$img);
            Image::make($image)->save($location);
            $content->logo = $img;
            DB::table('basic_information')->where('id', $content->id)->update(['logo' => $img]);
        }
        return redirect('admins');
    }

    public function updateInfo(Request $request){
        $this->validate($request,[

            'company_name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);


        $content = BasicInformation::find($request->id);

        $content->company_name = $request->company_name;
        $content->about = $request->about;
        $content->address = $request->address;
        $content->phone = $request->phone;
        $content->email = $request->email;
        $content->fax = $request->fax;
        $content->facebook = $request->facebook;
        $content->tweeter = $request->tweeter;
        $content->googleplus = $request->googleplus;
        $content->linkdin = $request->linkdin;

        $content->save();

        if($request->hasfile('logo')){
            $image = $request->file('logo');
            $img = 'logo'.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/uploads/'.$img);
            Image::make($image)->save($location);
            $content->logo = $img;
            DB::table('basic_information')->where('id', $request->id)->update(['logo' => $img]);
        }
        return redirect('admins');
    }

}
