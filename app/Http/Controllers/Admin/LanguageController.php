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

    public function destroy($id)
    {
        $data = Language::find($id);
        if (!$data) {
            return redirect()->back()->with('success', ' Deleted successfully');
        }
        $data->delete();
        return redirect()->back()->with('success', ' Deleted successfully');
    }

    public function keywordStore(Request $request){

        $this->validate($request, [
            'key_name' => 'required|string|max:255',
            'key_value' => 'required|string|max:255',
        ]);

        $keyword = new Keyword();
        $keyword->language_id =  $request->language_id;
        $keyword->key_name =  $request->key_name;
        $keyword->key_value =  $request->key_value;
        $keyword->save();
        return back()->with('success','Create Successfully');

    }

    public function keywordEdit($id){

        $language = Language::where('id',$id)->first();

        $data['page_title'] = 'Update '. $language->name . ' Keywords';
        $data['title'] = $language->name;
        $data['id'] = $language->id;
        $data['keywords'] = Keyword::where('language_id',$id)->get();
        $data['languages'] = Language::where('id','!=',$id)->get();

        return view('admin.language.keywords',$data);

    }

    public function KeywordUpdate(Request $request){

        foreach ($request->input('keywords') as $keywordId => $name) {
            Keyword::where('id', $keywordId)->update(['key_value' => $name]);
        }

        return back()->with('success', " updated successfully");

    }

    public function keywordImport($id)
    {


    }

    public function destroyKeyword($id)
    {
        $data = Keyword::find($id);
        if (!$data) {
            return redirect()->back()->with('success', ' Deleted successfully');
        }
        $data->delete();
        return redirect()->back()->with('success', ' Deleted successfully');
    }

}
