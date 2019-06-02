<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
class SettingsControler extends Controller
{	
	public function __construct(){
        $this->middleware('admin');
    }

	 public function index()
    {
    	return view('Settings.Settings')->with('Settings',Setting::first());
    }


    public function update(Request $request)
    {
    	 $this->validate($request,[
            "blog_name"    => "required",
            "phone_number"  => "required",
            "other_Phone" =>"required",
            "blog_email"  => "required" ,
            "adresse"  => "required",
             "RIB"  => "required"
            
        ]);
        $setting = Setting::first();
        $setting->blog_name =  $request->blog_name;
        $setting->phone_number =  $request->phone_number;
        $setting->other_Phone =  $request->other_Phone;
        $setting->blog_email = $request->blog_email;
        $setting->adresse = $request->adresse;
        $setting->RIB = $request->RIB;
        $setting->save();

        Session::flash('Setting');
        return redirect()->back();
    }
}
