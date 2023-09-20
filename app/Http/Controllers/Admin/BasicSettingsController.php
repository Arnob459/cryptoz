<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Social;


use Illuminate\Support\Facades\Storage;
use Image;

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

    //Contact
    public function Contact(){
        $data['page_title'] = 'Manage Contact';
        $data['contact'] = Settings::first();


        return view('admin.settings.contact',$data);
    }

    public function contactUpdate(Request $request){

        $this->validate($request, [
            'email' => 'required|string|max:50',
            'phone' => 'required|string|max:20',

        ]);

        $info = Settings::first();
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->save();
        return redirect()->route('admin.contact')->with('success', "Contact updated successfully");
    }

    //Breadcrumb
    public function Breadcrumb(){
        $data['page_title'] = 'Breadcrumb';
        $data['breadcrumb'] = Settings::first();

        return view('admin.settings.breadcrumb',$data);
    }

    public function breadcrumbUpdate(Request $request){

        $this->validate($request, [
            'breadcrumb' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $info = Settings::first();

        if ($request->hasFile('breadcrumb')) {
            $img = $request->file('breadcrumb');
            $file =  $img->getClientOriginalName();
            Image::make($img)->resize(1920,350)->save(public_path('assets/admin/images/breadcrumb/'.$file));
            $info->breadcrumb =  $file;
        }

        $info->save();
        return redirect()->route('admin.breadcrumb')->with('success', "Breadcrumb updated successfully");
    }

    //Social


      public function socialCreate(){
          $data['page_title'] = ' Social';
          $data['socials'] = Social::all();
          return view('admin.settings.social_create',$data);
      }

      public function socialStore(Request $request){

          $this->validate($request, [
            'icon' => 'required|string|max:255',
            'url' => 'required|string|max:255',
          ]);


          $social = new Social();
          $social->icon =  $request->icon;
          $social->url =  $request->url;
          $social->save();
          return redirect()->route('admin.social.create')->with('success',' Create Successfully');

      }

      public function socialEdit($id) {
          $data['page_title'] = 'Social Edit';
          $data['social'] = Social::find($id);
          return view('admin.settings.social_edit',$data);
      }
      public function socialUpdate(Request $request, $id){
        $this->validate($request, [
            'icon' => 'required|string|max:255',
            'url' => 'required|string|max:255',
          ]);
          $social = Social::find($id);
          $social->icon =  $request->icon;
          $social->url =  $request->url;
          $social->save();
          return redirect()->back()->with('success','Updated Successfully');
      }
      public function socialDelete($id){
          $social = Social::find($id);
          $social ->delete();
          return redirect()->route('admin.choose')->with('success','Deleted Successfully');

      }

    //Footer
    public function Footer(){
        $data['page_title'] = 'Footer Section';
        $data['footer'] = Settings::first();


        return view('admin.settings.footer',$data);
    }

    public function footerUpdate(Request $request){

        $this->validate($request, [
            'footer' => 'required|string|max:255',
            'copyright' => 'required|string|max:255',

        ]);

        $info = Settings::first();
        $info->footer = $request->footer;
        $info->copyright = $request->copyright;
        $info->save();
        return redirect()->route('admin.footer')->with('success', "Footer updated successfully");
    }


}
