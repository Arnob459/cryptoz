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

        $data = Settings::first();
        $data->site_name = $request->site_name;
        $data->currency = $request->currency;
        $data->currency_symbol = $request->currency_symbol;
        $data->ur_message = $request->ur_message;
        $data->ul_message = $request->ul_message;
        $data->ev = $request->ev;
        $data->en = $request->en;
        $data->ul = $request->ul;
        $data->ur = $request->ur;
        $data->save();
        return back()->with('success', "Basic Settings has been updated successfully");
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

        $data = Settings::first();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = $logo->getClientOriginalName();
            $logo->move(public_path('assets/admin/images/logo/'), $filename);
            $data->logo =  $filename;
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $filename = $favicon->getClientOriginalName();
            $favicon->move(public_path('assets/admin/images/logo/'), $filename);
            $data->favicon =  $filename;
        }

        $data->save();
        return back()->with('success', "Logo and Favicon has been updated successfully");
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

        $data = Settings::first();
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return back()->with('success', "Contact updated successfully");
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

        $data = Settings::first();

        if ($request->hasFile('breadcrumb')) {
            $img = $request->file('breadcrumb');
            $file =  $img->getClientOriginalName();
            Image::make($img)->resize(1920,350)->save(public_path('assets/admin/images/breadcrumb/'.$file));
            $data->breadcrumb =  $file;
        }

        $data->save();
        return back()->with('success', "Breadcrumb updated successfully");
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
      public function destroy($id)
      {
          $data = Social::find($id);
          if (!$data) {
              return redirect()->back()->with('success', ' Deleted successfully');
          }
          $data->delete();
          return redirect()->back()->with('success', ' Deleted successfully');
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

        $data = Settings::first();
        $data->footer = $request->footer;
        $data->copyright = $request->copyright;
        $data->save();


        return redirect()->back()->with('success', ' Updated successfully');
        //  return redirect()->route('admin.footer');
        // return redirect()->route('admin.footer')->with('success', "Footer updated successfully");


    }


}
