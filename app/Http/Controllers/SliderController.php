<?php

namespace App\Http\Controllers;

use App\Slider;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Image;
class SliderController extends Controller
{
    public function index(){
        $info_slider = Slider::all();
        return view('admin.slider.index', compact('info_slider'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function save_slider(Request $request){
        $save_slider = new Slider();
        if ($request->hasFile('image')){
            $teamImage = $request->file('image');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time().'_slider_'.$imageName;
            $directory = public_path('/slider-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($teamImage)->save($teamImgUrl);
            $save_slider->image = $fileName;
        }
        $save_slider->title = $request->title;
        $save_slider->short_description = $request->short_description;
        $save_slider->status = $request->status;
        $save_slider->save();
        \Brian2694\Toastr\Facades\Toastr::success('Slider has been Saved', 'Success');
        return redirect('/add/slider');
    }

    public function active_slider($id){
        $active_slider = Slider::find($id);
        $active_slider->status = 0;
        $active_slider->save();
        \Brian2694\Toastr\Facades\Toastr::success('Slider has been Pending', 'Pending');
        return redirect()->back();
    }

    public function pending_slider($id){
        $pending_slider = Slider::find($id);
        $pending_slider->status = 1;
        $pending_slider->save();
        \Brian2694\Toastr\Facades\Toastr::success('Slider has been Active', 'Active');
        return redirect()->back();
    }

    public function edit_slider($id){
        $edit_slider = Slider::find($id);
        return view('admin.slider.edit', compact('edit_slider'));
    }

    public function update_slider(Request $request){
        $update_slider = Slider::find($request->id);
        if ($request->hasFile('image')){
            if ($request->image){
                unlink(public_path('/slider-images/'.$update_slider->image));
            }
        }

        if ($request->hasFile('image')){
            $teamImage = $request->file('image');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time().'_slider_'.$imageName;
            $directory = public_path('/slider-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($teamImage)->save($teamImgUrl);
            $update_slider->image = $fileName;
        }
        $update_slider->title = $request->title;
        $update_slider->short_description = $request->short_description;
        $update_slider->status = $request->status;
        $update_slider->save();
        \Brian2694\Toastr\Facades\Toastr::success('Slider has been Update', 'Update');
        return redirect('/add/slider');
    }

    public function delete_slider($id){
        $sliders = Slider::find($id);
        $sliders->delete();
        \Brian2694\Toastr\Facades\Toastr::success('Slider has been Deleted', 'Update');
        return redirect()->back();
    }
}
