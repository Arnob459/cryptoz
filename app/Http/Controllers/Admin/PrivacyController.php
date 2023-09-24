<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

use Illuminate\Support\Facades\Storage;
use Image;

class PrivacyController extends Controller
{

        //Privacy
        public function Privacy()
        {
            $data['page_title'] = 'privacy & policy';
            $data['privacy'] = Page::first();
            return view('admin.pages.privacy',$data);
        }

        public function privacyUpdate(Request $request)
        {
            $this->validate($request, [
                'privacy_title' => 'required|string|max:255',
                'privacy_description' => 'required|string|max:5000',
            ]);

            $data = Page::first();
            $data->privacy_title = $request->privacy_title;
            $data->privacy_description = $request->privacy_description;
            $data->save();
            return back()->with('success','Updated Successfully');
        }
}
