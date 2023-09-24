<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\SmsTemplete;



class SmsController extends Controller
{

    //SMS Api
    public function smsApi(){
        $data['page_title'] = 'SMS API';
        $data['api'] = Settings::first();


        return view('admin.sms.sms_api',$data);
    }

    public function smsApiUpdate(Request $request){

        $this->validate($request, [
            'sms_api' => 'required|string|max:255',

        ]);

        $data = Settings::first();
        $data->sms_api = $request->sms_api;
        $data->save();
        return redirect()->route('admin.sms.api')->with('success', "SMS Api updated successfully");
    }

    //SMS Templete
    public function smsTemplete(){
        $data['page_title'] = 'SMS Templetes';
        $data['templetes'] = SmsTemplete::all();

        return view('admin.sms.sms_templete_list',$data);
    }

    public function smsTempleteEdit($id) {
        $data['page_title'] = SmsTemplete::where('id',$id)->value('name');
        $data['templete'] = SmsTemplete::find($id);
        return view('admin.sms.sms_templete_edit',$data);
    }

    public function smsTempleteUpdate(Request $request, $id){

      $this->validate($request, [
          'message' => 'required|string|max:3000',
        ]);
        $templete = SmsTemplete::find($id);
        $templete->status =  $request->status;
        $templete->message =  $request->message;
        $templete->save();
        return redirect()->back()->with('success','Updated Successfully');
    }

    public function smsTest(){

        $api = Settings::first();
        $url = $api->api_url;


        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => array("Content-Type: text/html; charset=utf-8"),
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/20100101 Firefox/19.0',
        ));
        $response = curl_exec($ch);



        return redirect()->back()->with('success','SMS Sent Successfully');
    }
}
