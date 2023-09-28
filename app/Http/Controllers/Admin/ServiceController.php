<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Service;

use Illuminate\Support\Facades\Storage;
use Image;

class ServiceController extends Controller
{

    //Services
      public function Service()
      {
          $data['page_title'] = 'Services';
          $data['service'] = Page::first();
          $data['services_list'] = Service::all();
          return view('admin.pages.services.service_list',$data);
      }

      public function serviceSectionUpdate(Request $request)
      {
          $this->validate($request, [
              'service_title' => 'required|string|max:255',
              'service_subtitle' => 'required|string|max:255',
          ]);

          $data = Page::first();
          $data->service_title = $request->service_title;
          $data->service_subtitle = $request->service_subtitle;
          $data->save();
          return back()->with('success','Updated Successfully');
      }

      public function servicesCreate(){
          $data['page_title'] = ' Service Create';
          return view('admin.pages.services.service_create',$data);
      }

      public function servicesStore(Request $request){

          $this->validate($request, [
              'title' => 'required|string|max:255',
              'subtitle' => 'required|string|max:255',
              'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
          ]);

          if ($request->hasFile('image')) {
              $img = $request->file('image');
              $file =  $img->getClientOriginalName();
              Image::make($img)->resize(64,64)->save(public_path('assets/admin/images/service/'.$file));
          }

          $service = new Service();
          $service->title =  $request->title;
          $service->subtitle =  $request->subtitle;
          $service->image =  $file;
          $service->save();
          return redirect()->route('admin.services')->with('success','Service Create Successfully');

      }

      public function servicesEdit($id) {
          $data['page_title'] = 'Service Edit';

          $data['service'] = Service::find($id);
          return view('admin.pages.services.service_edit',$data);
      }
      public function servicesUpdate(Request $request, $id){
          $this->validate($request, [
              'title' => 'required|string|max:255',
              'subtitle' => 'required|string|max:255',
              'image' => 'image|mimes:jpeg,png,jpg|max:2048',
          ]);

          $service = Service::find($id);
          $service->title =  $request->title;
          $service->subtitle =  $request->subtitle;
          if ($request->hasFile('image')) {
              $img = $request->file('image');
              $file =  $img->getClientOriginalName();
              Image::make($img)->resize(64,64)->save(public_path('assets/admin/images/service/'.$file));
              $service->image =  $file;
          }

          $service->save();
          return back()->with('success','service Updated Successfully');
      }
      public function destroy($id)
      {
          $data = Service::find($id);
          if (!$data) {
              return redirect()->back()->with('success', ' Deleted successfully');
          }
          $data->delete();
          return redirect()->back()->with('success', ' Deleted successfully');
      }
}
