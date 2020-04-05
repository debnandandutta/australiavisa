<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use App\Helpers\LogActivity;


class CategoryController extends Controller
{

    public function saveCategory(Request $request){
        $category = new Category();
        $category->display_type = $request->display_type;
        $category->parent = $request->category_parent;
        $category->name = $request->category_name;
        $category->slug = preg_replace('/\s+/', '-', strtolower($request->category_name));
        $category->top = $request->top_menu;
        $category->right = $request->left_menu;
        $category->footer = $request->footer_menu;
        $category->status = $request->publication_status;
        $category->save();
        LogActivity::addToLog('Menu Added -'.$request->category_name);
        return redirect('admins/category')->with('status','Category Saved Successfully');
    }

    public function manageCategory(){
        $parentCats = DB::table('categories')->where('parent', 0)->where('display_type', 'menu')->get();

        $categories  = DB::table('categories as a')
            ->join('categories as b', 'a.parent', '=', 'b.id')
            ->select('a.*', 'b.id as parentId', 'b.name as parentName')
            ->get();

        return view('admin.category',[
            'categories' => $categories, 'parentCats' => $parentCats
        ]);
    }

    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();

        return redirect('/category/manage');
    }

        public static function subCategories($catId){
           return $subCatgories = Category::where('parent', $catId)->get();
        }

    public function publishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();

        return redirect('/category');
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('edit-category',[
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request){

        $category = Category::find($request->id);

        $category->display_type = $request->display_type;
        $category->parent = $request->category_parent;
        $category->name = $request->category_name;
        $category->slug = preg_replace('/\s+/', '-', strtolower($request->category_name));
        $category->top = $request->top_menu;
        $category->right = $request->left_menu;
        $category->footer = $request->footer_menu;
        $category->status = $request->publication_status;
        if($category->save()){
            LogActivity::addToLog('Menu Updated'.$request->category_name);
            return redirect('/admins/category')->with('status','Category Updated Successfully');
        }else{
            return "cant";
        } ;


    }

    public function deleteCategory(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        LogActivity::addToLog('Menu Deleted'.$request->name);
        return redirect('/admins/category')->with('status','Category Deleted Successfully');
    }

    public function get_by_display_type(Request $request)
    {
        if (!$request->display_type) {
            $html = '<option value="">--No Entry--</option>';
        } else {
            $html = '';
            $categories = Category::where('display_type', $request->display_type)->get();
            foreach ($categories as $category) {

                $html .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
}
