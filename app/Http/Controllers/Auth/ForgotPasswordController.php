<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\Models\User;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function showotp(Request $request)
    {


         $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);


        $email = $request->email;

            $data = User::where('email', $email)
            ->first();
            if($data)
            {
            $otp = random_int(100000, 999999);
            $data->otp = $otp;
            $data->save();

            // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            //     $message->to($request->email);
            //     $message->subject('Reset Password');
            // });
            return view('auth.passwords.otp');
            }
            else{
                return back()->with('message','please enter valid email');

            }

    }


    public function otpConfirm(Request $request)
    {

        $request->validate([
            'otp' => ['required', 'string', 'max:20'],
        ]);

        $otp = $request->otp;

        $data = User::where('otp', $otp)->pluck('id')
        ->first();

        $dataa = User::where('otp', $otp)
        ->first();

        if( $dataa)
        {

            return view('auth.passwords.newpassword',compact('data'));
        }
        else
        {
            return redirect()->route('create.otp')->with('message','Your otp is Wrong');

        }

    }


    public function createPass(Request $request)
    {

        $request->validate([
            'password' => ['required', 'string','min:6'],
            'confirmpassword' => ['required', 'string','min:6'],
        ]);

        $newpassword = $request->password;
        $confirmpassword = $request->confirmpassword;
        $data = $request->user_id;

        if($newpassword == $confirmpassword){

            $pass = User::where('id', $request->user_id)->first();
            $pass->password = Hash::make($newpassword);
            $pass->password_text = $newpassword;
            $pass->save();

            return redirect()->route('login')->with('message','your password is changed! login now ');

        }
        else{

            return view('auth.passwords.newpassword',compact('data'))->with('message','New Password and Confirm Password is not matched');


        }




    }



    public function createOtp()
    {
        return view('auth.passwords.otp');

    }
    public function createnewPass()
    {
        return view('auth.passwords.newpassword');

    }



    use SendsPasswordResetEmails;
}
