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

        return view('admin.dashboard',$data);
    }

    public function AdminDetails($id) {

        $data['page_title'] = 'Profile';
        $data['user'] = Admin::find($id);

        return view('admin.profile.profile_edit', $data);
    }


    public function AdminDetailsUpdate(Request $request ,$id) {

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'phone' => 'required|integer|min:10',
            'username' => 'required|integer|digits:8|unique:admins,username,' . $id,
            'avatar' => 'image|mimes:jpeg,png,jpg|max:1048',
        ]);

        $user = Admin::find($id);
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

        return redirect()->route('admin.profile',$id)->with('success','Admin Information Updated Successfully');
    }

    public function ChangePassword($id) {

        $data['page_title'] = 'Change Password';
        $data['user'] = Admin::find($id);
        return view('admin.profile.change_password', $data);
    }


    public function UpdatePassword(Request $request ,$id) {

        $users = Admin::find($id);
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
             return redirect()->route('admin.password',$id)->with('error','New password and Confirm Password doesnot match');
            }
        $users->save();
        return redirect()->route('admin.password',$id)->with('success','Admin Information Updated Successfully');
        }
        else{
            return redirect()->route('admin.password',$id)->with('error','Old password doesnot match');
        }

    }
}
