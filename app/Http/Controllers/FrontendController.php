<?php

namespace App\Http\Controllers;

use App\adminProduct;
use App\Cashout;
use App\Category;
use App\Clients;
use App\Contact;
use App\Customer;
use App\CustomerProduct;
use App\Dynamic;
use App\Featured;
use App\FeaturedOrder;
use App\Footer;
use App\Logo;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Slider;
use App\SubCategory;
use App\Support;
use App\User;
use App\Work;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use DB;
use Session;
use Image;
use Mail;
class FrontendController extends Controller
{
    public function index(){
        $show_category = Category::orderBy('id', 'asc')
            ->where('status', 1)
            ->take(6)
            ->get();
        $products = Product::orderBy('id', 'asc')->where('status', 1)->paginate(12);
        $show_logo = Logo::where('status', 1)->get();
        $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $all_category = Category::where('status', 1)->get();
        $show_featurd = Featured::where('status', 1)->orderBy('id', 'desc')->take(4)->get();
        $show_work = Work::where('status', 1)->orderBy('id', 'asc')->take(3)->get();
        $show_client = Clients::where('status', 1)->orderBy('id', 'desc')->get();
        $show_about = Footer::where('status', 1)->take(1)->get();
        $show_customer_product = CustomerProduct::where('status', 1)->orderBy('id', 'desc')->get();
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.home.home', compact('show_category',
            'products',
            'show_logo',
            'show_slider',
            'all_category',
            'show_featurd',
            'show_work',
            'show_client',
            'show_about',
            'show_customer_product',
            'show_dynamic_page',
            'show_support_page'
        ));
    }

    public function category_page($id){
        $category_product = Product::where('sub_category_id',$id)->get();
        $product = Product::where('sub_category_id',$id)->first();
        $show_about = Footer::where('status', 1)->take(1)->get();
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        if ($product) {
            $product_view = 'product_' . $product->id;
            if (!Session::has($product_view)) {
                $product->increment('view_count');
                Session::put($product_view, 1);
            }
        }else{
        }
        $show_logo = Logo::where('status', 1)->get();
        $all_category = SubCategory::all();
        $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $show_category = Category::orderBy('id', 'asc')
            ->where('status', 1)
            ->take(6)
            ->get();
        return view('front.category.category-page', compact('category_product', 'show_logo',
            'show_category', 'show_slider', 'show_about', 'all_category', 'show_dynamic_page', 'show_support_page'));
    }

    public function featured_page($id){
        $featured_details = Featured::where('id', $id)->get();
        $details = Featured::where('id', $id)->first();
        $show_about = Footer::where('status', 1)->take(4)->get();
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
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
        return view('front.featured.featured-details', compact(
            'featured_details','show_slider',
            'show_logo', 'show_category',
            'rendom', 'show_about', 'show_dynamic_page', 'show_support_page'));
    }

    public function details_product($id){
        $details_product = Product::where('id', $id)->get();
        $view_product = Product::where('id', $id)->first();
        $product_view = 'product_'.$view_product->id;
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        if (!Session::has($product_view)){
            $view_product->increment('view_count');
            Session::put($product_view, 1);
        }
        $show_about = Footer::where('status', 1)->take(1)->get();
        $customer_product_details = CustomerProduct::all();
        $show_logo = Logo::where('status', 1)->get();
        $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $show_category = Category::orderBy('id', 'asc')
            ->where('status', 1)
            ->take(6)
            ->get();
        return view('front.products.product-details', compact(
            'details_product',
            'show_logo', 'show_slider',
            'show_category', 'show_about',
            'customer_product_details', 'show_dynamic_page', 'show_support_page'));
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
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.customer.customer-info', compact(
            'show_category',
            'sub_category',
            'show_logo', 'show_about', 'show_dynamic_page', 'show_support_page'));
    }

    public function customer_dashboard(){
        $show_customer = CustomerProduct::where('user_id',  Session::get('user_id'))->get();

        $show_category = Category::orderBy('id', 'asc')->get();
        $sub_category = SubCategory::all();
        $show_logo = Logo::all();
        $show_about = Footer::where('status', 1)->take(1)->get();
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.customer.customer-dashboard', compact('show_category',
            'sub_category', 'show_logo', 'show_about', 'show_customer', 'show_dynamic_page', 'show_support_page'));
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
            Session::put('user_id', $save_customer->id);
            Session::put('name', $save_customer->name);
            return redirect('/customer/dashboard');
        }
        Toastr::info('Your Registration Successfully', 'Success');

    }



    public function customer_login(Request $request)
    {

        $customer = Customer::where('email', $request->email)->first();
        if ($customer){
            if (password_verify($request->password, $customer->password)){
                Session::put('user_id', $customer->id);
                Session::put('name', $customer->name);
                return redirect('/customer/dashboard');
            }else{
                return redirect('/customer/info')->with('message', 'Password dose not match');
            }

        }else{
            return redirect('/customer/info')->with('message', 'E-mail dose not match');
        }

    }

    public function customer_logout(){
        Session::forget('user_id');
        Session::forget('name');
        return redirect('/');
    }


    //Searching Panel//

    public function search(Request $request){
        $product_search = $request->search;
        $sub_category = SubCategory::all();
        $show_logo = Logo::where('status', 1)->get();
        $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $all_category = Category::where('status', 1)->get();
        $show_featurd = Featured::where('status', 1)->orderBy('id', 'asc')->get();
        $show_work = Work::where('status', 1)->orderBy('id', 'asc')->take(3)->get();
        $show_client = Clients::where('status', 1)->orderBy('id', 'desc')->get();
        $show_about = Footer::where('status', 1)->take(1)->get();
        $show_customer_product = CustomerProduct::where('status', 1)->orderBy('id', 'desc')->get();
        $show_category = Category::orderBy('id', 'asc')
            ->where('status', 1)
            ->take(6)
            ->get();
        $products = Product::orderBy('id', 'desc')
            ->where('name', 'like', '%'.$product_search.'%')
            ->orwhere('short_description', 'like', '%'.$product_search.'%')
            ->orwhere('keyword', 'like', '%'.$product_search.'%')
            ->paginate(6);
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.home.search', compact('products',
            'show_logo',
            'show_slider',
            'all_category',
            'show_featurd',
            'show_work',
            'show_client',
            'show_about',
            'show_customer_product',
            'show_category',
            'sub_category',
            'show_dynamic_page',
            'show_support_page'
        ));
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
//        $total = $request->price*20/100;

        $customer_product->main_category_id = $request->main_category_id;
        $customer_product->sub_category_id = $request->sub_category_id;
        $customer_product->name = $request->name;
        $customer_product->price = $request->price;
        $customer_product->description = $request->description;
        $customer_product->user_id = Session::get('user_id');
        $customer_product->url = $request->url;
        $customer_product->demo_link = $request->demo_link;
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


    public function customer_product_edit($id){
        $customer_product_edit = CustomerProduct::find($id);
        $show_category = Category::orderBy('id', 'asc')->get();
        $sub_category = SubCategory::all();
        $show_logo = Logo::all();
        $show_about = Footer::where('status', 1)->take(1)->get();
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.customer.edit-dashboard', compact(
            'customer_product_edit', 'show_category', 'sub_category', 'show_logo', 'show_about', 'show_dynamic_page', 'show_support_page'));
    }

    public function customer_product_update(Request $request){
        $customer_product_update = CustomerProduct::find($request->id);

        if ($customer_product_update){
            $customer_product_update->status = 0;
        }
        $customer_product_update->update;

        if ($request->hasFile('image')){
            if ($request->image){
                unlink(public_path('customer-images/'.$customer_product_update->image));
            }
        }

        if ($request->hasFile('image')){
            $productImage = $request->file('image');
            $imageName = $productImage->getClientOriginalName();
            $fileName = time().'_customer_product_'.$imageName;
            $directory = public_path('/customer-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($productImage)->resize(350, 350)->save($teamImgUrl);
            $customer_product_update->image = $fileName;
        }

        $customer_product_update->main_category_id = $request->main_category_id;
        $customer_product_update->sub_category_id = $request->sub_category_id;
        $customer_product_update->name = $request->name;
        $customer_product_update->price = $request->price;
        $customer_product_update->description = $request->description;
        $customer_product_update->user_id = Session::get('user_id');
        $customer_product_update->demo_link = $request->demo_link;
        $customer_product_update->save();

        Toastr::success('Your Product has been Updated,Need to Admin Approved For Published', 'Success');
        return redirect('/customer/dashboard');
    }


    public function more_product(){
        $customer_product = CustomerProduct::where('status', 1)->paginate(9);
        $show_category = Category::orderBy('id', 'asc')->get();
        $sub_category = SubCategory::all();
        $show_logo = Logo::all();
        $show_about = Footer::where('status', 1)->take(1)->get();
        $all_category = Category::where('status', 1)->get();
        $show_slider = Slider::all();
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.customer.more-product', compact(
            'customer_product',
            'show_category',
            'sub_category',
            'show_logo',
            'show_about',
            'all_category',
            'show_slider',
            'show_dynamic_page',
            'show_support_page'
        ));
    }


    public function order_statement(Request $request){
        $this->validate($request,[
            'user_id' => 'required',
            'product_id' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'confirm' => 'required',
            'accept' => 'required',

        ]);


        $order_submit = new OrderProduct();
        $order_submit->user_id = $request->user_id;
        $order_submit->product_id = $request->product_id;
        $order_submit->name = $request->name;
        $order_submit->phone = $request->phone;
        $order_submit->email = $request->email;
        $order_submit->confirm = $request->confirm;
        $order_submit->accept = $request->accept;
        $order_submit->price = $request->price;
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

        Toastr::success('Your Information Send To Admin', 'Success');
        return redirect()->back();

    }


    public function customer_product_details($id){
        $customer_product_details = CustomerProduct::where('id', $id)->get();
        $view = CustomerProduct::where('id', $id)->first();
        $blogkey = 'product_' .$view->id;
        if (!Session::has($blogkey)){
            $view->increment('view_count');
            Session::put($blogkey, 1);
        }
        $show_category = Category::orderBy('id', 'asc')->get();
        $sub_category = SubCategory::all();
        $show_logo = Logo::all();
        $show_about = Footer::where('status', 1)->take(1)->get();
        $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
        $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.customer.customer-details', compact('customer_product_details',
            'show_category', 'sub_category', 'show_logo', 'show_about', 'show_dynamic_page', 'show_support_page'));
    }

        public function customer_statement(Request $request){

        $this->validate($request,[
            'user_id' => 'required',
            'product_id' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'confirm' => 'required',
            'accept' => 'required',

        ]);


            $order_submit = new OrderProduct();
            $order_submit->user_id = $request->user_id;
            $order_submit->product_id = $request->product_id;
            $order_submit->name = $request->name;
            $order_submit->phone = $request->phone;
            $order_submit->email = $request->email;
            $order_submit->confirm = $request->confirm;
            $order_submit->accept = $request->accept;
            $order_submit->price = $request->price;
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

            Toastr::success('Your Information Send To Admin', 'Success');
            return redirect()->back();
        }


        public function sale_statement(){
            $statement = OrderProduct::where('user_id', Session::get('user_id'))->get();
            $cash_out = Cashout::all();
            $show_category = Category::orderBy('id', 'asc')->get();
            $sub_category = SubCategory::all();
            $show_logo = Logo::all();
            $show_about = Footer::where('status', 1)->take(1)->get();
            $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
            $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.customer.sale-statement', compact(
            'show_category', 'sub_category',
            'show_logo', 'show_about', 'statement', 'cash_out', 'show_dynamic_page', 'show_support_page'));
        }

        public function saleWithdrawal($id){
            $statement = OrderProduct::find($id);
            return response()->json($statement);
        }


        public function cash_out(Request $request){
            $order = OrderProduct::find($request->id);
            if ($request->case_out){
                $order->price = 0.00;
            }
            $order->update();
            //======================//
            $cash_out = new Cashout();
            $cash_out->user_id = Session::get('name');
            $cash_out->case_out = $request->case_out;
            $cash_out->bank = $request->bank;
            $cash_out->mobile = $request->mobile;
            $cash_out->others = $request->others;
            $cash_out->confirm = $request->confirm;
            $cash_out->save();

            Toastr::success('Your Cash Withdrawal Successfully', 'Success');
            return redirect()->back();
        }



        public function admin_product(Request $request){
            $this->validate($request,[
               'name'  => 'required',
               'phone'  => 'required',
               'email'  => 'required|email',
               'confirm'  => 'required',
               'accept'  => 'required',
            ]);

            $admin_product = new adminProduct();
            $admin_product->name = $request->name;
            $admin_product->phone = $request->phone;
            $admin_product->email = $request->email;
            $admin_product->confirm = $request->confirm;
            $admin_product->accept = $request->accept;
            $admin_product->price = $request->price;
            $admin_product->product_id = $request->product_id;
            if ($admin_product->save()){
                Toastr::success('Your Order Successfully Done.  As Soon as Possible we will Contact You', 'Success');
                return redirect()->back();
            }else{
                Toastr::error('Your Order not Confirm Something is wrong information', 'Error');
                return redirect()->back();
            }
        }

        public function more_featured(){
            $show_logo = Logo::where('status', 1)->get();
            $all_category = SubCategory::all();
            $show_slider = Slider::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
            $show_category = Category::orderBy('id', 'asc')
                ->where('status', 1)
                ->take(6)
                ->get();
            $show_featurd = Featured::where('status', 1)->orderBy('id', 'asc')->paginate(6);
            $show_about = Footer::where('status', 1)->take(1)->get();
            $show_dynamic_page = Dynamic::orderBy('id', 'desc')->take(7)->get();
            $show_support_page = Support::orderBy('id', 'desc')->take(1)->get();
        return view('front.featured.more-featured', compact(
            'show_logo', 'all_category',
            'show_slider', 'show_category', 'show_featurd',
            'show_about', 'show_dynamic_page', 'show_support_page'));
        }



        public function order_featured(Request $request){

             $this->validate($request,[
           'name' => 'required|alpha|max:15|min:5',
           'phone' => 'required|min:11|max:15',
           'email' => 'required|email',
           'price' => 'required|numeric',
           'product_id' => 'required',
           'confirm' => 'required',
           'accept' => 'required',
        ]);

//            if ($validator->fails()) {
//                return redirect()->back()
//                    ->withErrors($validator)
//                    ->withInput();
//            }


            $featured_order = new FeaturedOrder();
            $featured_order->name = $request->name;
            $featured_order->phone = $request->phone;
            $featured_order->email = $request->email;
            $featured_order->price = $request->price;
            $featured_order->product_id = $request->product_id;
            $featured_order->confirm = $request->confirm;
            $featured_order->accept = $request->accept;
            if ($featured_order){
                $featured_order->save();
                return redirect()->back()->with('message', 'Your Order Successfully Submitted');
            }else{
                return redirect()->back()->with('error', 'Name Or Phone  Number are Wrong. Please Input Valid Name and Number');
            }

        }


}
