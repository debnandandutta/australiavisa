<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\DB;

use Image;

class ContentController extends Controller
{



    public function saveContent(Request $request){
        $this->validate($request,[

            'category_id'=>'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $content = new Content();
        $content->category_id = $request->category_id;
        $content->shortnote = $request->shortnote;
        $content->description = $request->description;
        $content->publication_status = $request->publication_status;
        $content->save();

        if($request->hasfile('featured_image')){
            $image = $request->file('featured_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = 'images/uploads/'.$img;
            Image::make($image)->resize(150,150)->save($location);
            $content->featured_image = $img;
            DB::table('contents')->where('id', $content->id)->update(['featured_image' => $img]);
        }
        LogActivity::addToLog('Content Saved');
        return redirect('admins/content/manage')->with('status','Content Saved Successfully');
    }

    public function manageContents(){

        $contents = DB::table('categories')
            ->rightJoin('contents', 'categories.id', '=', 'contents.category_id')

            ->get();

        return view('admin.view-contents',[
            'contents' => $contents
        ]);
    }
    public function newContent(){
          return view('admin.new-content');
    }
    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();

        return redirect('/category/manage');
    }

    public function publishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();

        return redirect('/category/manage');
    }

    public function editContent(Request $request){

         $singleContent = Content::find($request->id);
        $content = DB::table('contents')

           ->where('contents.id',$request->id)
           ->leftJoin('categories', 'categories.id', '=', 'contents.category_id')
            ->get();

        return view('admin.edit-content',[
            'content' => $content['0'],
            'singlecontent'=> $singleContent
        ]);
    }

    public function updateContent(Request $request){


        $this->validate($request,[

            'category_id'=>'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $content = Content::find($request->id);
        $content->category_id = $request->category_id;
        $content->shortnote = $request->shortnote;
        $content->description = $request->description;
        $content->publication_status = $request->publication_status;
        $content->save();

        if($request->hasfile('featured_image')){
            $image = $request->file('featured_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = 'images/uploads/'.$img;
            Image::make($image)->resize(150,150)->save($location);
            $content->featured_image = $img;
            DB::table('contents')->where('id', $request->id)->update(['featured_image' => $img]);
        }
        LogActivity::addToLog('Content Updated');
        return redirect('admins/content/manage')->with('status','Content Updated Successfully');
    }

    public function deleteContent(Request $request){
        $category = Content::find($request->id);
        $category->delete();

        return redirect('admins/content/manage')->with('status','Content Deleted Successfully');
    }
}
