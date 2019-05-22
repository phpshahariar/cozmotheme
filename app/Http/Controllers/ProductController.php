<?php

namespace App\Http\Controllers;

use App\adminProduct;
use App\Cashout;
use App\Category;
use App\Customer;
use App\CustomerProduct;
use App\Product;
use App\SubCategory;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Image;
use Session;
use DB;
class ProductController extends Controller
{
    public function index_product()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $show_product = Product::all();
        return view('admin.product.product', compact('show_product', 'sub_categories', 'categories'));
    }

    public function create_product()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin.product.create', compact('categories', 'sub_categories'));
    }

    public function save_product(Request $request)
    {
        $save_product = new Product();


        if ($request->hasFile('image')) {
            $teamImage = $request->file('image');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time() . '_product_' . $imageName;
            $directory = public_path('/product-images/');
            $teamImgUrl = $directory . $fileName;
            Image::make($teamImage)->resize(350, 350)->save($teamImgUrl);
            $save_product->image = $fileName;
        }

        $save_product->main_category_id = $request->main_category_id;
        $save_product->sub_category_id = $request->sub_category_id;
        $save_product->name = $request->name;
        $save_product->balance = $request->balance;
        $save_product->short_description = $request->short_description;
        $save_product->long_description = $request->long_description;
        $save_product->demo_link = $request->demo_link;
        $save_product->status = $request->status;

        $save_product->save();
        \Brian2694\Toastr\Facades\Toastr::success('Product Save Successfully :)', 'Success');
        return redirect('/add/product');
    }

    public function active_product($id)
    {
        $active_product = Product::find($id);
        $active_product->status = 0;
        $active_product->save();
        \Brian2694\Toastr\Facades\Toastr::success('Product Pending :)', 'Pending');
        return redirect()->back();
    }

    public function pending_product($id)
    {
        $pending_product = Product::find($id);
        $pending_product->status = 1;
        $pending_product->save();
        \Brian2694\Toastr\Facades\Toastr::success('Product Active :)', 'Active');
        return redirect()->back();
    }


    public function edit_product($id)
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $edit_product = Product::find($id);
        return view('admin.product.edit', compact('categories', 'sub_categories', 'edit_product'));
    }

    public function update_product(Request $request)
    {
        $customer_product = Product::find($request->id);

        if ($request->hasFile('image')){
            if ($request->image){
                unlink(public_path('product-images/'.$customer_product->image));
            }
        }

        if ($request->hasFile('image')) {
            $productImage = $request->file('image');
            $imageName = $productImage->getClientOriginalName();
            $fileName = time() . '_admin_product_' . $imageName;
            $directory = public_path('/product-images/');
            $teamImgUrl = $directory . $fileName;
            Image::make($productImage)->resize(350, 350)->save($teamImgUrl);
            $customer_product->image = $fileName;
        }

        $customer_product->main_category_id = $request->main_category_id;
        $customer_product->sub_category_id = $request->sub_category_id;
        $customer_product->name = $request->name;
        $customer_product->balance = $request->balance;
        $customer_product->short_description = $request->short_description;
        $customer_product->long_description = $request->long_description;
        $customer_product->demo_link = $request->demo_link;
        $customer_product->status = $request->status;

        $customer_product->save();
        \Brian2694\Toastr\Facades\Toastr::success('Product has been Updated :)', 'Success');
        return redirect('/add/product');
    }

    public function delete_product($id)
    {
        $delete_product = Product::find($id);
        $delete_product->delete();
        \Brian2694\Toastr\Facades\Toastr::error('Product has been Deleted :)', 'Deleted');
        return redirect()->back();
    }


    //Customer Product//

    public function customer_product()
    {

        $customer_product = CustomerProduct::all();
        return view('admin.customer-product.customer_product', compact('customer_product'));
    }

    public function customer_product_approved($id)
    {
        $customer_product_active = CustomerProduct::find($id);
        $customer_product_active->status = 0;
        $customer_product_active->save();
        \Brian2694\Toastr\Facades\Toastr::warning('Product has been Pending', 'Warning');
        return redirect()->back();
    }

    public function customer_product_pending($id)
    {
        $customer_product_pending = CustomerProduct::find($id);
        $customer_product_pending->status = 1;
        $customer_product_pending->save();
        \Brian2694\Toastr\Facades\Toastr::success('Product has been Approved', 'Success');
        return redirect()->back();
    }

    public function customer_product_edit($id)
    {
        $edit_customer_product = CustomerProduct::find($id);
        $show_category = Category::orderBy('id', 'asc')->get();
        $sub_categories = SubCategory::all();
        return view('admin.customer-product.customer-edit', compact('edit_customer_product', 'show_category', 'sub_categories'));
    }

    public function customer_product_update(Request $request)
    {
        $customer_product = CustomerProduct::find($request->id);

        $customer_product->main_category_id = $request->main_category_id;
        $customer_product->sub_category_id = $request->sub_category_id;
        $customer_product->name = $request->name;
        $customer_product->price = $request->price;
        $customer_product->description = $request->description;
        $customer_product->user_id = Session::get('user_id');
        $customer_product->url = $request->url;
        $customer_product->save();
        \Brian2694\Toastr\Facades\Toastr::success('Customer Product has been Updated', 'Success');
        return redirect('/customer/product');
    }

    public function customer_sale_statement()
    {
        $customer_cashout = Cashout::all();
        return view('admin.customer-product.sale-statement', compact('customer_cashout'));
    }

    public function statement_delete($id)
    {
        $customer_cashout_delete = Cashout::find($id);
        $customer_cashout_delete->delete();
        \Brian2694\Toastr\Facades\Toastr::success('Customer Cashout Statement has been Deleted', 'Success');
        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $product_search = $request->search;
        $customer_product = CustomerProduct::all();
        $customerProduct = CustomerProduct::orderBy('id', 'desc')
                                            ->where('name', 'Like', '%'.$product_search.'%')
                                            ->orwhere('description', 'Like', '%'.$product_search.'%')
                                            ->orwhere('search', 'Like', '%'.$product_search.'%')
                                            ->get();
        return view('admin.customer-product.product-search', compact('customerProduct', 'customer_product'));

    }

    public function admin_product(){
        $customer_order = adminProduct::all();
        return view('admin.adminorder.admin-order', compact('customer_order'));
    }



}
