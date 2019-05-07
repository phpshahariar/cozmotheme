<?php

namespace App\Http\Controllers;

use App\Category;
use App\Featured;
use App\Footer;
use App\Logo;
use App\Order;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;
use Session;
use DB;
use Mail;
class FeaturedController extends Controller
{
    public function show_featured(){
        $show_featured = Featured::orderBy('id', 'desc')->get();

        return view('admin.featured.show', compact('show_featured'));
    }

    public function create_featured(){
        $all_category = Category::all();
        $sub_category = SubCategory::all();
        return view('admin.featured.create', compact('all_category', 'sub_category'));
    }

    public function save_featured(Request $request){

        $this->validate($request,[
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'featured_name' => 'required|max:255',
            'price' => 'required',
            'long_description' => 'required',
            'image' => 'required',
        ]);


        $save_featured = new Featured();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $filename = time().'_featured_'.$imagename;
            $directory = public_path('/featured-images/');
            $imageurl = $directory.$filename;
            Image::make($image)->resize(300, 200)->save($imageurl);
            $save_featured->image = $filename;
        }



        $save_featured->main_category_id = $request->main_category_id;
        $save_featured->sub_category_id = $request->sub_category_id;
        $save_featured->featured_name = $request->featured_name;
        $save_featured->price = $request->price;
        $save_featured->long_description = $request->long_description;
        $save_featured->status = $request->status;
        $save_featured->save();
        Toastr::success('Featured has been successfully Save', 'Success');
        return redirect('/add/features');
    }

    public function customer_order(Request $request){
        $this->validate($request,[
            'name' => 'required|max:255',
            'phone' => 'required|max:15|min:11',
            'email' => 'required',
            'confirm' => 'required',
            'accept' => 'required',
        ]);
        $show_category = Category::orderBy('id', 'desc')->get();
        $sub_category = SubCategory::all();
        $show_logo = Logo::all();
        $show_about = Footer::where('status', 1)->take(4)->get();
        $order_submit = new Order();
        $order_submit->name = $request->name;
        $order_submit->phone = $request->phone;
        $order_submit->email = $request->email;
        $order_submit->confirm = $request->confirm;
        $order_submit->accept = $request->accept;
        $order_submit->url = $request->url();
        $order_submit->save();
        Session::put('name', $order_submit->name);
        Session::put('email', $order_submit->email);
        Session::put('phone', $order_submit->phone);

        $data = $order_submit->toArray();
        Mail::send('front.mail.mail', $data, function ($massage) use($data) {
            $massage->to($data ['email']);
            $massage->subject('CozmoTheme');
        });
        if (Session::get('email')) {
            return view('front.customer.customer-order', compact('show_logo', 'sub_category', 'show_category', 'show_about'));
        }else{
            return redirect()->back();
        }
    }

}
