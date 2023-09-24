<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

use App\Models\Faq;

class FaqController extends Controller
{
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

           $data = Page::first();
           $data->faq_title = $request->faq_title;
           $data->faq_subtitle = $request->faq_subtitle;
           $data->save();
           return back()->with('success','Updated Successfully');
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
           return back()->with('success','Updated Successfully');
       }
       public function faqDelete(Request $request){
        dd($request->faq_delete_id);
           $faq = Faq::find($request->faq_delete_id);
           $faq ->delete();
           return back()->with('success',' FAQ Deleted Successfully');

       }

        public function destroy($id)
        {
            $data = Faq::find($id);
            if (!$data) {
                return back()->with('error', 'Item not found');
            }
            $data->delete();
            return redirect()->back()->with('success', ' Deleted successfully');
        }

}
