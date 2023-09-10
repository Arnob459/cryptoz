<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function Index(){
        $data['page_title'] = 'Manage Plan';
        return view('admin.plan.plan_list',$data);
    }
}
