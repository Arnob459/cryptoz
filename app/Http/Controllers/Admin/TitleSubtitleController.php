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

            $data = Page::first();
            $data->plan_title = $request->plan_title;
            $data->plan_subtitle = $request->plan_subtitle;
            $data->deposit_title = $request->deposit_title;
            $data->deposit_subtitle = $request->deposit_subtitle;
            $data->method_title = $request->method_title;
            $data->method_subtitle = $request->method_subtitle;
            $data->save();
            return back()->with('success','Updated Successfully');
        }

}
