<?php

namespace App\Http\Controllers\Admin\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function Index(){
        return view('admin.management.plan');
    }
}
