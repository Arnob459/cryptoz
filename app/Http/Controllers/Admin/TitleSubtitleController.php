<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

use Illuminate\Support\Facades\Storage;
use Image;

class TitleSubtitleController extends Controller
{
        //titleSubtitle
        public function titleSubtitle()
        {
            $data['page_title'] = 'Title and Subtitle';
            $data['title'] = Page::first();
            return view('admin.pages.title_subtitle',$data);
        }

        public function titleSubtitleUpdate(Request $request)
        {
            $this->validate($request, [
                'plan_title' => 'required|string|max:255',
                'plan_subtitle' => 'required|string|max:255',
                'deposit_title' => 'required|string|max:255',
                'deposit_subtitle' => 'required|string|max:255',
                'method_title' => 'required|string|max:255',
                'method_subtitle' => 'required|string|max:255',
            ]);

            $main = Page::first();
            $main->plan_title = $request->plan_title;
            $main->plan_subtitle = $request->plan_subtitle;
            $main->deposit_title = $request->deposit_title;
            $main->deposit_subtitle = $request->deposit_subtitle;
            $main->method_title = $request->method_title;
            $main->method_subtitle = $request->method_subtitle;
            $main->save();
            return back()->with('success','Updated Successfully');
        }

}
