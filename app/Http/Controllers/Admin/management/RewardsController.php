<?php

namespace App\Http\Controllers\Admin\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RewardsController extends Controller
{
    //
    public function Index(){
        return view('admin.management.rewards');
    }

    public function Index1(){
        return view('admin.management.users.allusers');
    }
}
