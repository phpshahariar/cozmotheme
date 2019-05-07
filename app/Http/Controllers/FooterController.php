<?php

namespace App\Http\Controllers;

use App\Footer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(){
        $show_footer = Footer::all();
        return view('admin.about.show', compact('show_footer'));
    }

    public function create(){
        return view('admin.about.create');
    }

    public function save_footer(Request $request){
        $save_footer = new Footer();
        $save_footer->title = $request->title;
        $save_footer->category_name = $request->category_name;
        $save_footer->status = $request->status;
        $save_footer->save();
        Toastr::success('Save About info', 'Success');
        return redirect('/add/footer');
    }

    public function active_footer($id){
        $active_footer = Footer::find($id);
        $active_footer->status =0;
        $active_footer->save();
        Toastr::success(' About Activated', 'Success');
        return redirect()->back();
    }

    public function pending_footer($id){
        $pending_footer = Footer::find($id);
        $pending_footer->status =1;
        $pending_footer->save();
        Toastr::success(' About Pending', 'Success');
        return redirect()->back();
    }

    public function edit_footer($id){
        $edit_footer = Footer::find($id);
        return view('admin.about.edit', compact('edit_footer'));
    }

    public function update_footer(Request $request){
        $update_footer = Footer::find($request->id);
        $update_footer->title = $request->title;
        $update_footer->category_name = $request->category_name;
        $update_footer->status = $request->status;
        $update_footer->save();
        Toastr::success('Update About info', 'Success');
        return redirect('/add/footer');
    }

    public function delete_footer($id){
        $delete_footer = Footer::find($id);
        $delete_footer->delete();
        Toastr::success('Delete About info', 'Success');
        return redirect()->back();
    }
}
