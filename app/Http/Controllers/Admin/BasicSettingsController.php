<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;


class BasicSettingsController extends Controller
{
    //
    public function basicSettings(){
        $data['page_title'] = 'Basic Settings';
        $data['settings'] = Settings::first();


        return view('admin.settings.basic_settings',$data);
    }

    public function basicUpdate(Request $request){

        $this->validate($request, [
            'site_name' => 'required|string|max:50',
            'currency' => 'required|string|max:20',
            'currency_symbol' => 'required|string|max:5',
            'ur_message' => 'required|string|max:100',
            'ul_message' => 'required|string|max:100',

        ]);

        $info = Settings::first();
        $info->site_name = $request->site_name;
        $info->currency = $request->currency;
        $info->currency_symbol = $request->currency_symbol;
        $info->ur_message = $request->ur_message;
        $info->ul_message = $request->ul_message;
        $info->ev = $request->ev;
        $info->en = $request->en;
        $info->ul = $request->ul;
        $info->ur = $request->ur;
        $info->save();
        return redirect()->route('admin.settings')->with('success', "Basic Settings has been updated successfully");
    }

    public function logo(){
        $data['page_title'] = 'Logo Favicon';
        $data['settings'] = Settings::first();

        return view('admin.settings.logo_settings',$data);
    }

    public function logoUpdate(Request $request){

        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'favicon' => 'image|mimes:jpeg,png,jpg,ico|max:2048',
        ]);

        $info = Settings::first();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = $logo->getClientOriginalName();
            $logo->move(public_path('assets/admin/images/logo/'), $filename);
            $info->logo =  $filename;
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $filename = $favicon->getClientOriginalName();
            $favicon->move(public_path('assets/admin/images/logo/'), $filename);
            $info->favicon =  $filename;
        }

        $info->save();
        return redirect()->route('admin.logo')->with('success', "Logo and Favicon has been updated successfully");
    }

}
