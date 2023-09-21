<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Slider;

use Illuminate\Support\Facades\Storage;
use Image;

class SliderController extends Controller
{
    //Slider
        public function Slider()
        {
            $data['page_title'] = 'Sliders';
            $data['sliders'] = Slider::all();
            return view('admin.pages.slider.slider_list',$data);
        }

        public function sliderCreate(){
            $data['page_title'] = 'Add New Slider';
            return view('admin.pages.slider.slider_create',$data);
        }

        public function sliderStore(Request $request){

            $this->validate($request, [
                'title' => 'required|string|max:255',
                'subtitle' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $file =  $img->getClientOriginalName();
                Image::make($img)->resize(1920,1120)->save(public_path('assets/admin/images/slider/'.$file));
            }

            $slider = new Slider();
            $slider->title =  $request->title;
            $slider->subtitle =  $request->subtitle;
            $slider->image =  $file;
            $slider->save();
            return redirect()->route('admin.slider')->with('success','slider Create Successfully');

        }

        public function sliderEdit($id) {
            $data['page_title'] = 'Slider Edit';

            $data['slider'] = Slider::find($id);
            return view('admin.pages.slider.slider_edit',$data);
        }
        public function sliderUpdate(Request $request, $id){
            $this->validate($request, [
                'title' => 'required|string|max:255',
                'subtitle' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $slider = Slider::find($id);
            $slider->title =  $request->title;
            $slider->subtitle =  $request->subtitle;
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $file =  $img->getClientOriginalName();
                Image::make($img)->resize(1920,1120)->save(public_path('assets/admin/images/slider/'.$file));
                $slider->image =  $file;
            }

            $slider->save();
            return back()->with('success','slider Updated Successfully');
        }
        public function sliderDelete($id){
            $slider = Slider::find($id);
            $slider ->delete();
            return back()->with('success','slider Deleted Successfully');

        }

}
