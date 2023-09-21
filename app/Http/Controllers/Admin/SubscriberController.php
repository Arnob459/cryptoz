<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;


class SubscriberController extends Controller
{
    //
    public function Index(){
        $data['page_title'] = 'Subscribers';
        $data['subscribers'] = Subscriber::orderBy('id','desc')->get();
        return view('admin.subscribers.subscribers_list',$data);
    }

    public function Mail(){
        $data['page_title'] = 'Subscribers';
        return view('admin.subscribers.subscribers_mail',$data);
    }

    public function sendEmail(Request $request)
{
    $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    $subscribers = Subscriber::pluck('email')->toArray();

    foreach ($subscribers as $subscriber) {
        Mail::to($subscriber)->send(new NewsletterMail($request->subject, $request->message));
    }

    return redirect()->back()->with('success', 'Email sent to all subscribers!');
}


}
