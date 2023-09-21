<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Choose;

class ChooseUsController extends Controller
{

     //Why Choose Us
     public function Choose()
     {
         $data['page_title'] = 'Why Choose Us';
         $data['choose'] = Page::first();
         $data['chooses'] = Choose::all();
         return view('admin.pages.choose.choose_list',$data);
     }

     public function chooseSectionUpdate(Request $request)
     {
         $this->validate($request, [
             'choose_title' => 'required|string|max:255',
         ]);

         $main = Page::first();
         $main->choose_title = $request->choose_title;
         $main->choose_subtitle = $request->choose_subtitle;
         $main->save();
         return back()->with('success','Updated Successfully');
     }

     public function chooseCreate(){
         $data['page_title'] = ' Why Choose Us Create';
         return view('admin.pages.choose.choose_create',$data);
     }

     public function chooseStore(Request $request){

         $this->validate($request, [
           'icon' => 'required|string|max:255',
           'title' => 'required|string|max:255',
           'subtitle' => 'required|string|max:255',
         ]);


         $choose = new Choose();
         $choose->icon =  $request->icon;
         $choose->title =  $request->title;
         $choose->subtitle =  $request->subtitle;
         $choose->save();
         return redirect()->route('admin.choose')->with('success',' Create Successfully');

     }

     public function chooseEdit($id) {
         $data['page_title'] = 'Why Choose Us Edit';
         $data['choose'] = Choose::find($id);
         return view('admin.pages.choose.choose_edit',$data);
     }
     public function chooseUpdate(Request $request, $id){
           $this->validate($request, [
               'icon' => 'required|string|max:255',
               'title' => 'required|string|max:255',
               'subtitle' => 'required|string|max:255',
           ]);
         $choose = Choose::find($id);
         $choose->icon =  $request->icon;
         $choose->title =  $request->title;
         $choose->subtitle =  $request->subtitle;
         $choose->save();
         return back()->with('success','Updated Successfully');
     }
     public function chooseDelete($id){
         $choose = Choose::find($id);
         $choose ->delete();
         return back()->with('success','Deleted Successfully');

     }
}
