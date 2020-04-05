<?php

namespace App\Http\Controllers;

use App\BasicInformation;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class DirectorController extends Controller
{
    public function index(){
        $basicInfos = BasicInformation::where([
            ['id', '>', '1']
        ])->get();


        return view('admin.directors',[
            'contents' => $basicInfos
        ]);
    }
    public function create(){
        return view('admin.new-director');
    }
    public function saveInfo(Request $request){
        $this->validate($request,[

            'company_name'=>'required',
            'address'=>'required',
            'position'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $content = new BasicInformation();
        $content->company_name = $request->company_name;
        $content->slug = preg_replace('/\s+/', '-', strtolower($request->company_name));
        $content->position = $request->position;
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
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = 'images/uploads/'.$img;
            Image::make($image)->save($location);
            $content->logo = $img;
            DB::table('basic_information')->where('id', $content->id)->update(['logo' => $img]);
        }
        return redirect('admins/directors');
    }
    public function director($slug)
    {

        $categories = Category::where('parent', 0)->where('display_type','menu')->where('top',1)->get();
        $leftmenus = Category::where('display_type','menu')->where('left',1)->get();
        $basicInfos = BasicInformation::all()->first();


        $contents = DB::table('basic_information')
            ->where('slug', $slug)
            ->get();

        return view('deshbd.single-director',[
            'contents' => $contents, 'categories' => $categories,
            'basicInfos' => $basicInfos, 'leftmenus' =>$leftmenus
        ]);


    }
    public function updateInfo(Request $request){
        $this->validate($request,[

            'company_name'=>'required',
            'position'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);


        $content = BasicInformation::find($request->id);

        $content->company_name = $request->company_name;
        $content->slug = preg_replace('/\s+/', '-', strtolower($request->company_name));
        $content->position = $request->position;
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
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = 'images/uploads/'.$img;
            Image::make($image)->save($location);
            $content->logo = $img;
            DB::table('basic_information')->where('id', $request->id)->update(['logo' => $img]);
        }
        return redirect('admins/directors');
    }
    public function editDirector(Request $request){

        $directorInfo = BasicInformation::find($request->id);
        return view('admin.edit-director',[
            'directorInfo'=> $directorInfo
        ]);
    }
    public function delete(Request $request){
        $category = BasicInformation::find($request->id);
        $category->delete();

        return redirect('admins/directors')->with('status','Person Deleted Successfully');
    }
}
