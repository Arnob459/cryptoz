<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;


class PlanController extends Controller
{
    //
    public function Index(){
        $data['page_title'] = 'Manage Plan';
        return view('admin.plan.plan_list',$data);
    }

    public function planCreate(){
        $data['page_title'] = 'Add New Plan';
        return view('admin.plan.plan_create',$data);
    }

    public function planStore(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'min_amount' => 'numeric|min:1',
            'max_amount' => 'numeric|min:1',
            'fixed_amount' => 'numeric|min:1',
            'yearly_capitals' => 'required|numeric|min:1',
            'daily_earning' => 'required|numeric|min:1',

        ]);

        $plan = new Plan;
        $plan->name = $request->name;
            if($request->has('min_amount')){
                $plan->min_amount = $request->min_amount;
                $plan->max_amount = $request->max_amount;
            }
            if($request->has('fixed_amount')){
                $plan->fixed_amount = $request->fixed_amount;
            }

        $plan->yearly_capitals = $request->yearly_capitals;
        $plan->daily_earning = $request->daily_earning;

        $plan->save();

        return redirect()->route('admin.plan.create')->with('success','New Plan has been Create Successfully');

    }

}
