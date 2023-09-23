<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Validator;



class PlanController extends Controller
{
    //
    public function Index(){
        $data['page_title'] = 'Manage Plan';
        $data['plans'] = Plan::orderBy('id', 'desc')->get();

        return view('admin.plan.plan_list',$data);
    }

    public function planCreate(){
        $data['page_title'] = 'Add New Plan';
        return view('admin.plan.plan_create',$data);
    }

    public function planStore(Request $request){

        $request->validate([
            'name' => 'required|string|max:255|unique:plans',
            'amount_type' => 'required|in:range,fixed',
            'min_amount' => $request->input('amount_type') === 'range' ? 'required|numeric|min:1' : '',
            'max_amount' => $request->input('amount_type') === 'range' ? 'required|numeric|gte:min_amount' : '',
            'fixed_amount' => $request->input('amount_type') === 'fixed' ? 'required|numeric|min:1' : '',
            'earning_capasity' => 'required|numeric|min:1',
            'daily_earning' => 'required|numeric|min:1',
        ]);


        $plan = new Plan ;
        $plan->name = $request->input('name');
        $plan->amount_type = $request->input('amount_type');
        $plan->earning_capasity = $request->input('earning_capasity');
        $plan->daily_earning = $request->input('daily_earning');


        if ($request->input('amount_type') === 'range') {
            $plan->min_amount = $request->input('min_amount');
            $plan->max_amount = $request->input('max_amount');
        } elseif ($request->input('amount_type') === 'fixed') {
            $plan->fixed_amount = $request->input('fixed_amount');
        }

        $plan->save();


        return back()->with('success','New Plan has been Create Successfully');

    }

    public function planEdit($id){
        $data['page_title'] = 'Edit Plan';
        $data['plan'] = Plan::find($id);


        return view('admin.plan.plan_edit',$data);
    }

    public function planUpdate(Request $request ,$id){

        $request->validate([
            'name' => 'required|string|max:255',
            'amount_type' => 'required|in:range,fixed',
            'min_amount' => $request->input('amount_type') === 'range' ? 'required|numeric|min:1' : '',
            'max_amount' => $request->input('amount_type') === 'range' ? 'required|numeric|gte:min_amount' : '',
            'fixed_amount' => $request->input('amount_type') === 'fixed' ? 'required|numeric|min:1' : '',
            'earning_capasity' => 'required|numeric|min:1',
            'daily_earning' => 'required|numeric|min:1',
        ]);

        $plan = Plan::findorfail($id);
        $plan->name = $request->name;
        $plan->amount_type = $request->amount_type;

        $plan->earning_capasity = $request->earning_capasity;
        $plan->daily_earning = $request->daily_earning;
        $plan->status = $request->status;



        if ($request->input('amount_type') === 'range') {
            $plan->min_amount = $request->input('min_amount');
            $plan->max_amount = $request->input('max_amount');
            $plan->fixed_amount = 0;

        } elseif ($request->input('amount_type') === 'fixed') {
            $plan->fixed_amount = $request->input('fixed_amount');
            $plan->min_amount = 0;
            $plan->max_amount = 0;
        }
        $plan->save();

        return back()->with('success', "Plan has been updated successfully");
    }



}
