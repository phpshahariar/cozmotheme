<?php

namespace App\Http\Controllers;

use App\Work;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;
class WorkController extends Controller
{
    public function index(){
        $show_work = Work::all();
        return view('admin.work.index', compact('show_work'));
    }

    public function create(){
        return view('admin.work.create');
    }

    public function save_product(Request $request){
        $save_work = new Work();

        if ($request->hasFile('image')){
            $teamImage = $request->file('image');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time().'_work_'.$imageName;
            $directory = public_path('/work-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($teamImage)->resize(300, 300)->save($teamImgUrl);
            $save_work->image = $fileName;
        }

        $save_work->title = $request->title;
        $save_work->short_description = $request->short_description;
        $save_work->status = $request->status;
        $save_work->save();
        Toastr::success('Work has been Added', 'Success');
        return redirect('/add/work');
    }

    public function active_work($id){
        $active_work = Work::find($id);
        $active_work->status =0;
        $active_work->save();
        Toastr::success('Work Active Successfully', 'Success');
        return redirect()->back();
    }

    public function pending_work($id){
        $pending_work = Work::find($id);
        $pending_work->status =1;
        $pending_work->save();
        Toastr::success('Work Pending Successfully', 'Success');
        return redirect()->back();
    }

    public function edit_work($id){
        $pending_work = Work::find($id);
        return view('admin.work.edit', compact('pending_work'));
    }

    public function update_work(Request $request){
        $update_work = Work::find($request->id);
        if ($request->hasFile('image')){
            if ($request->image){
                unlink(public_path('/work-images/'.$update_work->image));
            }
        }

        if ($request->hasFile('image')){
            $teamImage = $request->file('image');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time().'_work_'.$imageName;
            $directory = public_path('/work-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($teamImage)->resize(300, 300)->save($teamImgUrl);
            $update_work->image = $fileName;
        }

        $update_work->title = $request->title;
        $update_work->short_description = $request->short_description;
        $update_work->status = $request->status;
        $update_work->save();
        Toastr::success('Work has been Updated', 'Success');
        return redirect('/add/work');
    }

    public function delete_work($id){
        $delete_work = Work::find($id);
        $delete_work->delete();
        Toastr::success('Work has been Deleted', 'Success');
        return redirect()->back();
    }
}
