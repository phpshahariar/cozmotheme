<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $show_customer_opinion = Contact::all();
        return view('admin.home.home', compact('show_customer_opinion'));
    }

    public function contact_delete($id){
        $delete_contact = Contact::find($id);
        $delete_contact->delete();
        Toastr::success('Contact User Info Delete', 'Success');
        return redirect()->back();
    }

}
