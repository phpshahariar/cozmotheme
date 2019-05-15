<?php

namespace App\Http\Controllers;

use App\Customer;
use App\OrderProduct;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function customer_order_request(){
        $customer_order = OrderProduct::all();
        return view('admin.customer-product.customer-order', compact('customer_order'));
    }

    public function customer_order_pending($id){
        $customer_order_pending = OrderProduct::find($id);
        $customer_order_pending->status = 1;
        $customer_order_pending->save();
        Toastr::success('Customer Balance Delivered', 'Success');
        return redirect()->back();
    }
//    public function customer_order_cofirm($id){
//        $customer_order_confirm = OrderProduct::find($id);
//        $customer_order_confirm->status = 0;
//        $customer_order_confirm->save();
//        Toastr::success('Customer Balance Not Delivered', 'Info');
//        return redirect()->back();
//    }

    public function customer_order_delete($id){
        $customer_order_delete = OrderProduct::find($id);
        $customer_order_delete->delete();
        Toastr::success('Customer Delivered Deleted', 'Success');
        return redirect()->back();
    }
}
