<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RewardsController extends Controller
{
    //
    public function Index(){
        $data['page_title'] = 'Manage Rewards';

        return view('admin.rewards.rewards_list',$data);
    }

}
