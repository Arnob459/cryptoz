<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

use Illuminate\Support\Facades\Storage;
use Image;


class AboutController extends Controller
{
        //About
    public function About()
    {
        $data['page_title'] = 'About US';
        $data['about'] = Page::first();
        return view('admin.pages.about',$data);
    }

    public function aboutUpdate(Request $request)
    {
        $this->validate($request, [
            'about_title' => 'required|string|max:255',
            'about_description' => 'required|string|max:5000',
            'about_image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $main = Page::first();
        $main->about_title = $request->about_title;
        $main->about_description = $request->about_description;

        if ($request->hasFile('about_image')) {
            $image = $request->file('about_image');
            $filename =  $image->getClientOriginalName();
            Image::make($image)->resize(626,626)->save(public_path('assets/admin/images/about/'.$filename));
            $main->about_image =  $filename;
        }
        $main->save();
        return back()->with('success','Updated Successfully');
    }
}
