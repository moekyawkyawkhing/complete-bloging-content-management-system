<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SiteSettingController extends Controller
{
    public function index(){
    	$site_setting=Setting::first();
    	return view('setting.edit',compact('site_setting'));
    }

    public function update(Request $request,$id){

    	$this->validate($request,[
    		'name' => 'required|max:50',
    		'address' => 'required',
    		'contact_no' => 'required',
    		'contact_email' => 'required|email'
    	]);

    	$update_setting=Setting::whereId($id)->first();
    	$update_setting->name=$request->get('name');
    	$update_setting->address=$request->get('address');
    	$update_setting->contact_number=$request->get('contact_no');
    	$update_setting->contact_email=$request->get('contact_email');

    	$update_setting->update();

    	Session::flash('success','Site setting update successful');
    	return redirect()->back();

    }
}
