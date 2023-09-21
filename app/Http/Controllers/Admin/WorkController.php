<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Work;


class WorkController extends Controller
{

    //Work
      public function Work()
      {
          $data['page_title'] = 'How its Work';
          $data['work'] = Page::first();
          $data['works'] = Work::all();
          return view('admin.pages.work.work_list',$data);
      }

      public function workSectionUpdate(Request $request)
      {
          $this->validate($request, [
              'work_title' => 'required|string|max:255',
              'work_subtitle' => 'required|string|max:255',
          ]);

          $main = Page::first();
          $main->work_title = $request->work_title;
          $main->work_subtitle = $request->work_subtitle;
          $main->save();
          return back()->with('success','Updated Successfully');
      }

      public function workCreate(){
          $data['page_title'] = ' How its Work Create';
          return view('admin.pages.work.work_create',$data);
      }

      public function workStore(Request $request){

          $this->validate($request, [
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
          ]);


          $work = new Work();
          $work->icon =  $request->icon;
          $work->title =  $request->title;
          $work->subtitle =  $request->subtitle;
          $work->save();
          return redirect()->route('admin.work')->with('success','Work Create Successfully');

      }

      public function workEdit($id) {
          $data['page_title'] = 'How its Work Edit';
          $data['work'] = Work::find($id);
          return view('admin.pages.work.work_edit',$data);
      }
      public function workUpdate(Request $request, $id){
            $this->validate($request, [
                'icon' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'subtitle' => 'required|string|max:255',
            ]);
          $work = Work::find($id);
          $work->icon =  $request->icon;
          $work->title =  $request->title;
          $work->subtitle =  $request->subtitle;
          $work->save();
          return back()->with('success','Updated Successfully');
      }
      public function workDelete($id){
          $work = Work::find($id);
          $work ->delete();
          return back()->with('success','Deleted Successfully');

      }

}
