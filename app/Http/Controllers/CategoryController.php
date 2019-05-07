<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use http\Env\Response;
use Session;
class CategoryController extends Controller
{
    public function index(){
        $show_category = Category::orderBy('id', 'desc')->get();
        return view('admin.category.category', compact('show_category'));
    }

    public function add_category(Request $request){

        $insert = new Category();
        $insert->main_category = $request->main_category;
        $insert->status = $request->status;
        $insert->save();
        Toastr::success('Category Save Successfully :)', 'Success');
        return redirect('/add/category');
    }

    public function category_data(){

        return view('admin.category.show');
    }

    public function published_category($id){
        $published_category = Category::find($id);
        $published_category->status =0;
       $published_category->save();
       return redirect()->back()->with('message', 'Category Unpublished Successfully');
    }

    public function unpublished_category($id){
        $unpublished_category = Category::find($id);
        $unpublished_category->status =1;
        $unpublished_category->save();
        return redirect()->back()->with('message', 'Category Published Successfully');
    }

    public function edit_category($id){
        $edit_category = Category::find($id);
        return view('admin.category.edit', compact('edit_category'));
    }

    public function update_category(Request $request){

        $update_category = Category::find($request->id);
        $update_category->main_category = $request->main_category;
        $update_category->status = $request->status;
        $update_category->save();
        Toastr::success('Category Update Successfully :)', 'Success');
        return redirect('/add/category');
    }

    public function delete_category($id){
        $delete_category = Category::find($id);
        $delete_category->delete();
        Toastr::error('Category Deleted :)', 'Delete');
        return redirect('/add/category');
    }

    public function sub_category(){
        $main_category = Category::all();
        $sub_category = SubCategory::all();
        return view('admin.subcategory.sub-category', compact('main_category', 'sub_category'));
    }

    ///sb-category start

    public function create_sub_category(){
        $main_category = Category::all();
        return view('admin.subcategory.create', compact('main_category'));
    }

    public function save_sub_category(Request $request){
        $sub_category = new SubCategory();
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->main_category_id = $request->main_category_id;
        $sub_category->status = $request->status;
        $sub_category->save();
        Toastr::success('SubCategory Saved :)', 'Success');
        return redirect('/add/sub/category');
    }

    public function active_sub_category($id){
        $active_sub_category = SubCategory::find($id);
        $active_sub_category->status = 0;
        $active_sub_category->save();
        Toastr::success('SubCategory Pending :)', 'Pending');
        return redirect()->back();
    }

    public function pending_sub_category($id){
        $active_sub_category = SubCategory::find($id);
        $active_sub_category->status = 1;
        $active_sub_category->save();
        Toastr::success('SubCategory Active :)', 'Active');
        return redirect()->back();
    }

    public function edit_sub_category($id){
        $edit_category = SubCategory::find($id);
        $main_category = Category::all();
        return view('admin.subcategory.edit', compact('edit_category', 'main_category'));
    }

    public function update_sub_category(Request $request){
        $update_sub_category = SubCategory::find($request->id);
        $update_sub_category->sub_category_name = $request->sub_category_name;
        $update_sub_category->main_category_id = $request->main_category_id;
        $update_sub_category->status = $request->status;
        $update_sub_category->save();
        Toastr::success('SubCategory Updated :)', 'Updated');
        return redirect('/add/sub/category');
    }

    public function delete_sub_category($id){
        $delete_sub_category = SubCategory::find($id);
        $delete_sub_category->delete();
        Toastr::success('SubCategory Delete :)', 'Delete');
        return redirect()->back();
    }


}
