<?php

namespace App\Http\Controllers;

use App\Dynamic;
use App\Support;
use Illuminate\Http\Request;

class DynamicController extends Controller
{
    public function dynamic_page(){
        $dynamic_page_show = Dynamic::orderBy('id', 'desc')->get();
        return view('admin.page.dynamic-page', compact('dynamic_page_show'));
    }

    public function save_page(Request $request){
        $dynamic_page = new Dynamic();
        $dynamic_page->page_name = $request->page_name;
        $dynamic_page->page_link = $request->page_link;
        $dynamic_page->save();
        return redirect()->back()->with('message', 'Dynamic Page Save Successfully');
    }


    public function edit_page($id){
        $edit_dynamic_page = Dynamic::find($id);
        return view('admin.page.edit-page', compact('edit_dynamic_page'));
    }

    public function update_page(Request $request){
        $update_dynamic_page = Dynamic::find($request->id);
        $update_dynamic_page->page_name = $request->page_name;
        $update_dynamic_page->page_link = $request->page_link;
        $update_dynamic_page->save();
        return redirect('/dynamic/page')->with('message', 'Dynamic Page Updated');
    }

    public function delete_page($id){
        $delete_dynamic_page = Dynamic::find($id);
        $delete_dynamic_page->delete();
        return redirect('/dynamic/page')->with('message', 'Dynamic Page has been Deleted');
    }

    public function support_page(){
        $show_support = Support::all();
        return view('admin.page.support', compact('show_support'));
    }

    public function support_save(Request $request){
        $save_support = new Support();
        $save_support->support = $request->support;
        $save_support->save();
        return redirect()->back()->with('message', 'Support Information Save Successfully');

    }

    public function support_edit($id){
        $edit_support = Support::find($id);
        return view('admin.page.edit-support', compact('edit_support'));
    }

    public function support_update(Request $request){
        $update_support = Support::find($request->id);
        $update_support->support = $request->support;
        $update_support->save();
        return redirect('/support')->with('message', 'Support Information Updated');
    }

    public function support_delete($id){
        $delete_support = Support::find($id);
        $delete_support->delete();
        return redirect('/support')->with('message', 'Support Information Deleted');
    }
}
