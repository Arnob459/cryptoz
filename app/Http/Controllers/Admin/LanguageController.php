<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Keyword;



class LanguageController extends Controller
{
    //
    public function Language()
    {
        $data['page_title'] = 'Language Manager';
        $data['languages'] = Language::orderBy('id','asc')->get();

        return view('admin.language.language_list',$data);
    }
    public function languageStore(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);

        $language = new Language();
        $language->name =  $request->name;
        $language->code =  $request->code;
        if ($request->status != null) {
            $language->status =  $request->status;
        }
        else {
            $language->status =  0;
        }


        $language->save();
        return back()->with('success','New Language Create Successfully');

    }
    public function languageEdit($id){

        $data = Language::find($id);

         return response()->json([
            'language' =>$data,
         ]);

    }

    public function languageUpdate(Request $request){


        $request->validate([
            'language_name' => 'required|string|max:255',

        ]);

        $id = $request->input('language_id');

        $language = Language::find($id);

        if ($request->language_status == null) {
            $language->status =  0 ;
        }
        else {
            $language->status =  1;

        }

        $language->name = $request->language_name;
        $language->save();

        return back()->with('success', " updated successfully");


    }

    public function languageDelete(Request $request,$id){
        $language = Language::find($id)->delete();
        return back()->with('success', " Deleted successfully");

    }

    public function keywordEdit($id){

        $data['page_title'] = 'Update '. Language::where('id',$id)->value('name'). ' Keywords';
        $data['title'] = 'Update '. Language::where('id',$id)->value('name'). ' Keywords';
        $data['keywords'] = Keyword::where('language_id',$id)->get();
        return view('admin.language.keywords',$data);

    }

    public function KeywordUpdate(Request $request){




        return back()->with('success', " updated successfully");


    }

}
