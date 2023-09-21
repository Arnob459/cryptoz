<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

use Illuminate\Support\Facades\Storage;
use Image;

class TermsController extends Controller
{
    //Terms
        public function Terms()
        {
            $data['page_title'] = 'Terms & Conditions';
            $data['terms'] = Page::first();
            return view('admin.pages.terms',$data);
        }

        public function termsUpdate(Request $request)
        {
            $this->validate($request, [
                'terms_title' => 'required|string|max:255',
                'terms_description' => 'required|string|max:5000',
            ]);

            $main = Page::first();
            $main->terms_title = $request->terms_title;
            $main->terms_description = $request->terms_description;
            $main->save();
            return back()->with('success','Updated Successfully');
        }
}
