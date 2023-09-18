<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;


class RewardsController extends Controller
{
    //
    public function Index(){
        $data['page_title'] = 'Manage Rewards';
        $data['rewards'] = Reward::all();


        return view('admin.rewards.rewards_list',$data);
    }

    public function rewardEdit($id){
        $data['page_title'] = 'Edit Rewards';
        $data['reward'] = Reward::find($id);


        return view('admin.rewards.rewards_edit',$data);
    }

}
