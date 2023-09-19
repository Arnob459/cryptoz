<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Counter;
use App\Models\Work;
use App\Models\Faq;






use Illuminate\Support\Facades\Storage;
use Image;


class PagesController extends Controller
{
    //Banner
    public function Banner()
    {
        $data['page_title'] = 'Banner Update';
        $data['banner'] = Page::first();
        return view('admin.pages.banner',$data);
    }

    public function bannerUpdate(Request $request)
    {
        $this->validate($request, [
            'banner_title' => 'required|string|max:255',
            'banner_subtitle' => 'required|string|max:255',
            'banner_bg_img' => 'image|mimes:jpeg,png,jpg|max:2048',
            'banner_img' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $main = Page::first();
        $main->banner_title = $request->banner_title;
        $main->banner_subtitle = $request->banner_subtitle;

        if ($request->hasFile('banner_bg_img')) {
            $image = $request->file('banner_bg_img');
            $filename =  $image->getClientOriginalName();
            Image::make($image)->resize(1920,1120)->save(public_path('assets/admin/images/banner/'.$filename));
            $main->banner_bg_img =  $filename;
        }
        if ($request->hasFile('banner_img')) {
            $img = $request->file('banner_img');
            $file =  $img->getClientOriginalName();
            Image::make($img)->resize(950,720)->save(public_path('assets/admin/images/banner/'.$file));
            $main->banner_img =  $file;
        }
        $main->save();
        return redirect()->route('admin.banner')->with('success','Updated Successfully');
    }

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
            return redirect()->back()->with('success','slider Updated Successfully');
        }
        public function sliderDelete($id){
            $slider = Slider::find($id);
            $slider ->delete();
            return redirect()->route('admin.slider')->with('success','slider Deleted Successfully');

        }

        //Services
        public function Service()
        {
            $data['page_title'] = 'Services';
            $data['service'] = Page::first();
            $data['services_list'] = Service::all();
            return view('admin.pages.services.service_list',$data);
        }

        public function serviceModify(Request $request)
        {
            $this->validate($request, [
                'service_title' => 'required|string|max:255',
                'service_subtitle' => 'required|string|max:255',
            ]);

            $main = Page::first();
            $main->service_title = $request->service_title;
            $main->service_subtitle = $request->service_subtitle;
            $main->save();
            return redirect()->route('admin.services')->with('success','Updated Successfully');
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
            return redirect()->back()->with('success','service Updated Successfully');
        }
        public function servicesDelete($id){
            $service = Service::find($id);
            $service ->delete();
            return redirect()->route('admin.services')->with('success','slider Deleted Successfully');

        }

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
        return redirect()->route('admin.about')->with('success','Updated Successfully');
    }

                //Counter
                public function Counter()
                {
                    $data['page_title'] = 'Counter';
                    $data['counter'] = Page::first();
                    $data['counters'] = Counter::all();
                    return view('admin.pages.counter.counter_list',$data);
                }

                public function counterSectionUpdate(Request $request)
                {
                    $this->validate($request, [
                        'counter_title' => 'required|string|max:255',
                        'counter_subtitle' => 'required|string|max:255',
                    ]);

                    $main = Page::first();
                    $main->counter_title = $request->counter_title;
                    $main->counter_subtitle = $request->counter_subtitle;
                    $main->save();
                    return redirect()->route('admin.counter')->with('success','Updated Successfully');
                }

                public function counterCreate(){
                    $data['page_title'] = ' Counter Create';
                    return view('admin.pages.counter.counter_create',$data);
                }

                public function counterStore(Request $request){

                    $this->validate($request, [
                      'icon' => 'required|string|max:255',
                      'title' => 'required|string|max:255',
                      'number' => 'required|string|max:255',
                    ]);


                    $counter = new Counter();
                    $counter->icon =  $request->icon;
                    $counter->title =  $request->title;
                    $counter->number =  $request->number;
                    $counter->save();
                    return redirect()->route('admin.counter')->with('success','Counter Create Successfully');

                }

                public function counterEdit($id) {
                    $data['page_title'] = 'Counter Edit';
                    $data['counter'] = Counter::find($id);
                    return view('admin.pages.counter.counter_edit',$data);
                }
                public function counterUpdate(Request $request, $id){
                    $this->validate($request, [
                      'icon' => 'required|string|max:255',
                      'title' => 'required|string|max:255',
                      'number' => 'required|string|max:255',
                    ]);

                    $counter = Counter::find($id);
                    $counter->icon =  $request->icon;
                    $counter->title =  $request->title;
                    $counter->number =  $request->number;
                    $counter->save();
                    return redirect()->back()->with('success','Updated Successfully');
                }
                public function counterDelete($id){
                    $service = Counter::find($id);
                    $service ->delete();
                    return redirect()->route('admin.counter')->with('success','counter Deleted Successfully');

                }

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
          return redirect()->route('admin.work')->with('success','Updated Successfully');
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
          return redirect()->back()->with('success','Updated Successfully');
      }
      public function workDelete($id){
          $work = Work::find($id);
          $work ->delete();
          return redirect()->route('admin.work')->with('success','Deleted Successfully');

      }

       //Faq
       public function Faq()
       {
           $data['page_title'] = 'FAQ';
           $data['faq'] = Page::first();
           $data['faqs'] = Faq::all();
           return view('admin.pages.faq.faq_list',$data);
       }

       public function faqSectionUpdate(Request $request)
       {
           $this->validate($request, [
               'faq_title' => 'required|string|max:255',
               'faq_subtitle' => 'required|string|max:255',
           ]);

           $main = Page::first();
           $main->faq_title = $request->faq_title;
           $main->faq_subtitle = $request->faq_subtitle;
           $main->save();
           return redirect()->route('admin.faq')->with('success','Updated Successfully');
       }

       public function faqCreate(){
           $data['page_title'] = ' FAQ Create';
           return view('admin.pages.faq.faq_create',$data);
       }

       public function faqStore(Request $request){

           $this->validate($request, [
             'qus' => 'required|string|max:255',
             'ans' => 'required|string|max:5000',
           ]);


           $faq = new Faq();
           $faq->qus =  $request->qus;
           $faq->ans =  $request->ans;
           $faq->save();
           return redirect()->route('admin.faq')->with('success','FAQ Create Successfully');

       }

       public function faqEdit($id) {
           $data['page_title'] = 'FAQ Edit';
           $data['faq'] = Faq::find($id);
           return view('admin.pages.faq.faq_edit',$data);
       }
       public function faqUpdate(Request $request, $id){
        $this->validate($request, [
            'qus' => 'required|string|max:255',
            'ans' => 'required|string|max:5000',
          ]);
           $faq = Faq::find($id);
           $faq->qus =  $request->qus;
           $faq->ans =  $request->ans;
           $faq->save();
           return redirect()->back()->with('success','Updated Successfully');
       }
       public function faqDelete($id){
           $faq = Faq::find($id);
           $faq ->delete();
           return redirect()->route('admin.faq')->with('success',' FAQ Deleted Successfully');

       }



}
