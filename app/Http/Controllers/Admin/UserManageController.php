<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserManageController extends Controller
{
    //
    public function Index(){
        $data['page_title'] = 'All Users';
        $data['all_users'] = User::orderBy('id','desc')->get();


        return view('admin.manage_user.all_users',$data);
    }

    public function activeUsers(){
        $data['page_title'] = 'Active Users';
        $data['active_users'] = User::where('status',1)->orderBy('id','desc')->get();


        return view('admin.manage_user.active_users',$data);
    }

    public function pendingUsers(){
        $data['page_title'] = 'Pending Users';
        $data['pending_users'] = User::where('status',2)->orderBy('id','desc')->get();


        return view('admin.manage_user.pending_users',$data);
    }

    public function blockedUsers(){
        $data['page_title'] = 'Blocked Users';
        $data['blocked_users'] = User::where('status',3)->orderBy('id','desc')->get();


        return view('admin.manage_user.blocked_users',$data);
    }

    public function emailUnverifiedUsers(){
        $data['page_title'] = 'Email Unverified Users';
        $data['email_unverified_users'] = User::where('email_verify', 0)->orderBy('id','desc')->get();


        return view('admin.manage_user.email_unverified_users',$data);
    }

    public function smsUnverifiedUsers(){
        $data['page_title'] = 'Sms Unverified Users';
        $data['sms_unverified_users'] = User::where('sms_verify', 0)->orderBy('id','desc')->get();


        return view('admin.manage_user.sms_unverified_users',$data);
    }

    public function userEdit($id){

        $data['user'] = User::find($id);
        $data['page_title'] = 'User:' .$data['user']->username;
        $data['ref'] = User::find( $data['user']->refferal);

        return view('admin.manage_user.user_edit',$data);
    }

    public function userUpdate(Request $request ,$id){

        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'username' => 'required|integer|digits:8|unique:users,username,'.$user->id,
            'phone' => 'required|integer|min:10|unique:users,phone,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);


        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->email_verify = $request->email_verify;
        $user->sms_verify = $request->sms_verify;
        $user->two_fa_status = $request->two_fa_status;
        $user->two_fa_verify = $request->two_fa_verify;
        $user->status = $request->status;

        $user->save();

        return back()->with('success', " updated successfully");
    }
}
