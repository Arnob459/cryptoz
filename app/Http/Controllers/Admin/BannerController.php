<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

use Illuminate\Support\Facades\Storage;
use Image;

class BannerController extends Controller
{
    //
        //Banner
        public function Banner()
        {
            $data['page_title'] = 'Banner Update';
            $data['banner'] = Page::first();
            return view('admin.pages.banner',$data);
        }

        public function bannerUpdate(Request $request)
        {
            $this->validate($request, [
                'banner_title' => 'required|string|max:255',
                'banner_subtitle' => 'required|string|max:255',
                'banner_bg_img' => 'image|mimes:jpeg,png,jpg|max:2048',
                'banner_img' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $data = Page::first();
            $data->banner_title = $request->banner_title;
            $data->banner_subtitle = $request->banner_subtitle;

            if ($request->hasFile('banner_bg_img')) {
                $image = $request->file('banner_bg_img');
                $filename =  $image->getClientOriginalName();
                Image::make($image)->resize(1920,1120)->save(public_path('assets/admin/images/banner/'.$filename));
                $data->banner_bg_img =  $filename;
            }
            if ($request->hasFile('banner_img')) {
                $img = $request->file('banner_img');
                $file =  $img->getClientOriginalName();
                Image::make($img)->resize(950,720)->save(public_path('assets/admin/images/banner/'.$file));
                $data->banner_img =  $file;
            }
            $data->save();
            return back()->with('success','Updated Successfully');
        }

}
