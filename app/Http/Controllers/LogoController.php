<?php

namespace App\Http\Controllers;

use App\Logo;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Image;
class LogoController extends Controller
{
    public function index(){
        $show_logo = Logo::all();
        return view('admin.logo.index', compact('show_logo'));
    }

    public function create(){
        return view('admin.logo.create');
    }

    public function save_logo(Request $request){
        $save_logo = new Logo();

        if ($request->hasFile('image')){
            $teamImage = $request->file('image');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time().'_logo_'.$imageName;
            $directory = public_path('/logo-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($teamImage)->resize(140, 40)->save($teamImgUrl);
            $save_logo->image = $fileName;
        }
        $save_logo->status = $request->status;
        $save_logo->save();
        \Brian2694\Toastr\Facades\Toastr::success('Logo has been Saved', 'Success');
        return redirect('/add/logo');
    }

    public function active_logo($id){
        $active_logo = Logo::find($id);
        $active_logo->status =0;
        $active_logo->save();
        \Brian2694\Toastr\Facades\Toastr::success('Logo has been Pending', 'Pending');
        return redirect()->back();
    }

    public function pending_logo($id){
        $active_logo = Logo::find($id);
        $active_logo->status =1;
        $active_logo->save();
        \Brian2694\Toastr\Facades\Toastr::success('Logo has been Active', 'Active');
        return redirect()->back();
    }

    public function edit_logo($id){
        $edit_logo = Logo::find($id);
        return view('admin.logo.edit', compact('edit_logo'));
    }

    public function update_logo(Request $request){
        $update_logo = Logo::find($request->id);
        if ($request->hasFile('image')){
            if ($request->image){
                unlink(public_path('/logo-images/'.$update_logo->image));
            }
        }
        if ($request->hasFile('image')){
            $teamImage = $request->file('image');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time().'_logo_'.$imageName;
            $directory = public_path('/logo-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($teamImage)->resize(140, 40)->save($teamImgUrl);
            $update_logo->image = $fileName;
        }
        $update_logo->status = $request->status;
        $update_logo->save();
        \Brian2694\Toastr\Facades\Toastr::success('Logo has been Updated', 'Update');
        return redirect('/add/logo');
    }

    public function delete_logo($id){
        $delete_logo = Logo::find($id);
        $delete_logo->delete();
        \Brian2694\Toastr\Facades\Toastr::error('Logo has been Deleted', 'Deleted');
        return redirect()->back();
    }
}
