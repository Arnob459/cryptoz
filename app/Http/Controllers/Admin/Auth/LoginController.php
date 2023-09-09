<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin_guest')->except('logout');
    }



    public function showLoginForm()
    {

        return view('admin.auth.login');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function abcd(){
        return 0 ;
    }
    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        // dd($this->guard()) ;
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // if ($response = $this->loggedOut($request)) {
        //     return $response;
        // }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }



}





// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Http\Request;

// class LoginController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Login Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles authenticating users for the application and
//     | redirecting them to your home screen. The controller uses a trait
//     | to conveniently provide its functionality to your applications.
//     |
//     */

//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = '/home';

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }

//     public function login(Request $request)
//     {
//         $input = $request->all();

//         $this->validate($request, [
//             'username' => 'required|string',
//             'password' => 'required',
//         ]);

//         if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
//         {
//             if (auth()->user()->is_admin == 1) {
//                 return redirect()->route('admin.home');
//             }else{
//                 return redirect()->route('home');
//             }
//         }else{
//             return redirect()->route('login')
//                 ->with('error','Email-Address And Password Are Wrong.');
//         }

//     }
// }

