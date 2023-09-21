<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class DashboardController extends Controller
{
    //
    public function Index(){
       $data['page_title'] = 'Dashboard';
       $data['all_users'] = User::count();
       $data['active_users'] = User::where('status',1)->count();
       $data['pending_users'] = User::where('status',2)->count();
       $data['blocked_users'] = User::where('status',3)->count();
       $data['email_verified_users'] = User::where('email_verify',1)->count();
       $data['email_unverified_users'] = User::where('email_verify',0)->count();
       $data['sms_verified_users'] = User::where('sms_verify',1)->count();
       $data['sms_unverified_users'] = User::where('sms_verify',0)->count();

        return view('admin.dashboard',$data);
    }

    public function Profile() {

        $data['page_title'] = 'Profile';
        $data['user'] =   auth('admin')->user();
        return view('admin.profile.profile_edit', $data);
    }


    public function profileUpdate(Request $request) {

        $admin = auth('admin')->user();
        $id=$admin->id;

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'phone' => 'required|integer|min:10',
            'username' => 'required|integer|digits:8|unique:admins,username,' . $id,
            'avatar' => 'image|mimes:jpeg,png,jpg|max:1048',
        ]);

        $user = auth('admin')->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = $avatar->getClientOriginalName();
            $avatar->move(public_path('assets/admin/images/avatar/'), $filename);
            $user->avatar =  $filename;
        }

        $user->save();

        return back()->with('success','Admin Information Updated Successfully');
    }

    public function ChangePassword() {

        $data['page_title'] = 'Change Password';
        $data['user'] = auth('admin')->user();
        return view('admin.profile.change_password', $data);
    }


    public function UpdatePassword(Request $request) {

        $users = auth('admin')->user();
        $old_pass = $users->password;

        if (password_verify($request->input('oldpassword'), $old_pass)) {

            $request->validate([
                'newpassword' => ['required', 'string','min:5'],
                'confirmpassword' => ['required', 'string','min:5'],
            ]);

            if ($request->newpassword == $request->confirmpassword)
             {
                $users->password = Hash::make($request->newpassword);
            }

            else{
             return back()->with('error','New password and Confirm Password doesnot match');
            }
            $users->save();
            return back()->with('success','Password changed Successfully');
        }
            else{
                return back()->with('error','Old password doesnot match');
            }

    }
}
