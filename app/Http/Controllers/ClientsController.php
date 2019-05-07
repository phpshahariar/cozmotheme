<?php

namespace App\Http\Controllers;

use App\Clients;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;
class ClientsController extends Controller
{
    public function index(){
        $show_client = Clients::all();
        return view('admin.clients.client', compact('show_client'));
    }

    public function create(){
        return view('admin.clients.index');
    }

    public function save_client(Request $request){
        $save_client = new Clients();

        if ($request->hasFile('client_logo')){
            $teamImage = $request->file('client_logo');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time().'_client_'.$imageName;
            $directory = public_path('/clients-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($teamImage)->resize(150, 70)->save($teamImgUrl);
            $save_client->client_logo = $fileName;
        }
        $save_client->status = $request->status;
        $save_client->save();
        Toastr::success('Clients Work Uploaded Successfully', 'Success');
        return redirect('/add/client');
    }

    public function active_client($id){
        $active_client = Clients::find($id);
        $active_client->status =0;
        $active_client->save();
        Toastr::success('Clients Work Activated', 'Success');
        return redirect()->back();
    }

    public function pending_client($id){
        $pending_client = Clients::find($id);
        $pending_client->status =1;
        $pending_client->save();
        Toastr::success('Clients Work Pending', 'Success');
        return redirect()->back();
    }

    public function edit_client($id){
        $edit_client = Clients::find($id);
        return view('admin.clients.edit', compact('edit_client'));
    }

    public function update_client(Request $request){
        $update_client = Clients::find($request->id);
        if ($request->hasFile('client_logo')){
            if ($request->client_logo){
                unlink(public_path('clients-images/'.$update_client->client_logo));
            }
        }
        if ($request->hasFile('client_logo')){
            $teamImage = $request->file('client_logo');
            $imageName = $teamImage->getClientOriginalName();
            $fileName = time().'_client_'.$imageName;
            $directory = public_path('/clients-images/');
            $teamImgUrl = $directory.$fileName;
            Image::make($teamImage)->resize(150, 70)->save($teamImgUrl);
            $update_client->client_logo = $fileName;
        }
        $update_client->status = $request->status;
        $update_client->save();
        Toastr::success('Clients Work Updated', 'Success');
        return redirect('/add/client');
    }

    public function delete_client($id){
        $delete_client = Clients::find($id);
        $delete_client->delete();
        Toastr::success('Clients Work Deleted', 'Success');
        return redirect()->back();
    }

}
