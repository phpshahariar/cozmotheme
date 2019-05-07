<?php

namespace App\Http\Controllers;

use App\Category;
use App\Clients;
use App\Contact;
use App\Customer;
use App\CustomerProduct;
use App\Featured;
use App\Footer;
use App\Logo;
use App\Product;
use App\Slider;
use App\SubCategory;
use App\User;
use App\Work;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use DB;
use Session;
use Image;
class FrontendController extends Controller
{
    public function index(){
        $show_category = Category::orderBy('id', 'asc')
            ->where('status', 1)
            ->take(6)
            ->get();
        $products = Product::orderBy('id', 'desc')->where('status', 1)->take(12)->get();
        $show_logo = Logo::where('status', 1)->get();
        $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $all_category = Category::where('status', 1)->get();
        $show_featurd = Featured::where('status', 1)->orderBy('id', 'asc')->get();
        $show_work = Work::where('status', 1)->orderBy('id', 'asc')->take(3)->get();
        $show_client = Clients::where('status', 1)->orderBy('id', 'desc')->get();
        $show_about = Footer::where('status', 1)->take(1)->get();
        return view('front.home.home', compact('show_category',
            'products',
            'show_logo',
            'show_slider',
            'all_category',
            'show_featurd',
            'show_work',
            'show_client',
            'show_about'
        ));
    }

    public function category_page($id){
        $category_product = Product::where('sub_category_id',$id)->get();
        $product = Product::where('sub_category_id',$id)->first();
        $show_about = Footer::where('status', 1)->take(1)->get();
        if ($product) {
            $product_view = 'product_' . $product->id;
            if (!Session::has($product_view)) {
                $product->increment('view_count');
                Session::put($product_view, 1);
            }
        }else{
        }
        $show_logo = Logo::where('status', 1)->get();
        $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $show_category = Category::orderBy('id', 'asc')
            ->where('status', 1)
            ->take(6)
            ->get();
        return view('front.category.category-page', compact('category_product', 'show_logo', 'show_category', 'show_slider', 'show_about'));
    }

    public function featured_page($id){
        $featured_details = Featured::where('id', $id)->get();
        $details = Featured::where('id', $id)->first();
        $show_about = Footer::where('status', 1)->take(4)->get();
        $blogkey = 'blog_' .$details->id;
        if (!Session::has($blogkey)){
            $details->increment('view_count');
            Session::put($blogkey, 1);
        }
        $rendom = Featured::all()->random(2);
        $show_logo = Logo::where('status', 1)->get();
        $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $show_category = Category::orderBy('id', 'asc')
            ->where('status', 1)
            ->take(6)
            ->get();
        return view('front.featured.featured-details', compact('featured_details','show_slider', 'show_logo', 'show_category', 'rendom', 'show_about'));
    }

    public function details_product($id){
        $details_product = Product::where('id', $id)->get();
        $view_product = Product::where('id', $id)->first();
        $product_view = 'product_'.$view_product->id;
        $show_about = Footer::where('status', 1)->take(4)->get();
        if (!Session::has($product_view)){
            $view_product->increment('view_count');
            Session::put($product_view, 1);
        }
        $show_logo = Logo::where('status', 1)->get();
        $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $show_category = Category::orderBy('id', 'asc')
            ->where('status', 1)
            ->take(6)
            ->get();
        return view('front.products.product-details', compact('details_product', 'show_logo', 'show_slider','show_category', 'show_about'));
    }

    public function contact_info(Request $request){

        $this->validate($request,[
            'name' => 'required|max:255',
            'number' => 'required|max:15|min:11',
            'comments'=> 'required',
        ]);


        $contact_info = new Contact();
        $contact_info->name = $request->name;
        $contact_info->number = $request->number;
        $contact_info->comments = $request->comments;
        $contact_info->save();
        Toastr::success('Send Your Opinion We will feedback Soon', 'Success');
        return redirect()->back();
    }

    public function customer_info(){
        $show_category = Category::orderBy('id', 'desc')->get();
        $sub_category = SubCategory::all();
        $show_logo = Logo::all();
        $show_about = Footer::where('status', 1)->take(1)->get();
        return view('front.customer.customer-info', compact('show_category', 'sub_category', 'show_logo', 'show_about'));
    }

    public function customer_dashboard(){
        Session::get('id');
        $show_customer = CustomerProduct::all();
        $show_category = Category::orderBy('id', 'asc')->get();
        $sub_category = SubCategory::all();
        $show_logo = Logo::all();
        $show_about = Footer::where('status', 1)->take(1)->get();


        return view('front.customer.customer-dashboard', compact('show_category',
            'sub_category', 'show_logo', 'show_about', 'show_customer'));
    }

    public function customer_reg(Request $request){
        $this->validate($request,[
            'name'  => 'required|max:255',
            'email'  => 'required|unique:customers|email',
            'password'  => 'required',

        ]);

        $save_customer = new Customer();
        $save_customer->name = $request->name;
        $save_customer->email = $request->email;
        $save_customer->password = bcrypt($request->password);
        $save_customer->save();
        if ($save_customer->id){
            Session::put('id', $save_customer->id);
            Session::put('name', $save_customer->name);
            return redirect('/customer/dashboard');
        }
        Toastr::info('Your Registration Successfully', 'Success');

    }



    public function customer_login(Request $request)
    {

        $customer = Customer::where('email', $request->email)->first();
        if ($customer){
            Session::put('id', $customer->id);
            Session::put('name', $customer->name);
            return redirect('/customer/dashboard');
        }else{
            return redirect('/customer/info')->with('message', 'Invalid Login');
        }

    }

    public function customer_logout(){
        Session::forget('id');
        Session::forget('name');
        return redirect('/');
    }




    //Customer Category Start//
    public function customer_product(Request $request){

        $this->validate($request,[
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required|max:10|min:3',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png',
        ]);

       $customer_product =  new CustomerProduct();
        Session::get('id');

        if ($request->hasFile('image')){
            $productImage = $request->file('image');
            $imageName = $productImage->getClientOriginalName();
            $fileName = time().'_customer_product_'.$imageName;
            $directory = public_path('/customer-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($productImage)->resize(350, 350)->save($teamImgUrl);
            $customer_product->image = $fileName;
        }

        $customer_product->main_category_id = $request->main_category_id;
        $customer_product->sub_category_id = $request->sub_category_id;
        $customer_product->name = $request->name;
        if ($customer_product->price = $request->price)
            $customer_product->price = $request->price;
        else{

        }
        $customer_product->description = $request->description;
        $customer_product->user_id = Session::get('id');
        $customer_product->save();
        Toastr::success('Your Product has been uploaded,Need to Admin Approved For Published', 'Success');
        return redirect()->back();

    }

    public function delete_product($id){
        $delete_product =  CustomerProduct::find($id);
        $delete_product->delete();
        Toastr::success('Your Product Deleted', 'Success');
        return redirect()->back();
    }


}
