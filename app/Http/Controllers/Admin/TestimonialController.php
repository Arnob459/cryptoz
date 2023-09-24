<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Image;

class TestimonialController extends Controller
{
    //Testimonial
        public function Testimonial()
        {
            $data['page_title'] = 'Testimonial';
            $data['testimonial'] = Page::first();
            $data['testimonials'] = Testimonial::all();
            return view('admin.pages.testimonial.testimonial_list',$data);
        }

        public function testimonialSectionUpdate(Request $request)
        {
            $this->validate($request, [
                'testimonial_title' => 'required|string|max:255',
                'testimonial_subtitle' => 'required|string|max:255',
            ]);

            $main = Page::first();
            $main->testimonial_title = $request->testimonial_title;
            $main->testimonial_subtitle = $request->testimonial_subtitle;
            $main->save();
            return back()->with('success','Updated Successfully');
        }

        public function testimonialCreate(){
            $data['page_title'] = ' Testimonial Create';
            return view('admin.pages.testimonial.testimonial_create',$data);
        }

        public function testimonialStore(Request $request){

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'quote' => 'required|string|max:3000',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $file =  $img->getClientOriginalName();
                Image::make($img)->resize(200,200)->save(public_path('assets/admin/images/testimonial/'.$file));
            }

            $testimonial = new Testimonial();
            $testimonial->name =  $request->name;
            $testimonial->designation =  $request->designation;
            $testimonial->quote =  $request->quote;
            $testimonial->image =  $file;
            $testimonial->save();
            return redirect()->route('admin.testimonial')->with('success','Testimonial Create Successfully');

        }

        public function testimonialEdit($id) {
            $data['page_title'] = 'Testimonial Edit';

            $data['testimonial'] = Testimonial::find($id);
            return view('admin.pages.testimonial.testimonial_edit',$data);
        }
        public function testimonialUpdate(Request $request, $id){
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'quote' => 'required|string|max:3000',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $testimonial = Testimonial::find($id);
            $testimonial->name =  $request->name;
            $testimonial->designation =  $request->designation;
            $testimonial->quote =  $request->quote;

            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $file =  $img->getClientOriginalName();
                Image::make($img)->resize(200,200)->save(public_path('assets/admin/images/testimonial/'.$file));
                $testimonial->image =  $file;
            }

            $testimonial->save();
            return back()->with('success','Testimonial Updated Successfully');
        }
        public function destroy($id)
        {
            $data = Testimonial::find($id);
            if (!$data) {
                return back()->with('error', 'Item not found');
            }
            $data->delete();
            return redirect()->back()->with('success', ' Deleted successfully');
        }
}
