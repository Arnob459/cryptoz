<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    //
    public function Index(){
        return view('admin.referral.referral_list');
    }
}