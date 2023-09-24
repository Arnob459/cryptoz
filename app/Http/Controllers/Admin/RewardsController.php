<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\RewardLevel;



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
        $data['levels'] = RewardLevel::all();

        return view('admin.rewards.rewards_edit',$data);
    }

    public function rewardUpdate(Request $request ,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'time_limit' => 'required|in:1,0',
            'hours' => $request->input('hours') == '1' ? 'required|integer|min:1' : '',
            'image' => 'image|mimes:jpeg,png,jpg',

        ]);

        $reward = Reward::findorfail($id);
        $reward->name = $request->name;
        $reward->time_limit = $request->time_limit;
        $reward->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('assets/admin/images/rewards/'), $filename);
            $reward->image =  $filename;
        }

        if ($request->input('time_limit') === '1') {
            $reward->hours = $request->input('hours');

        } elseif ($request->input('time_limit') === '0') {

            $reward->hours = null;
        }
        $reward->save();

        if ($request->has('user')) {

            $request->validate([
                'user.*' => 'required|integer|max:255',
                'business.*' => 'required|numeric|min:1',
                'amount.*' => 'required|numeric|min:1',

            ]);

            RewardLevel::truncate();

            for ($i=0 ; $i < count($request->user)  ; $i++ ) {

                // dd($request->user[$i]);

                RewardLevel::create([
                    'reward_id' => $id,
                    'level_name' => 'Level ' . ($i + 1),
                    'paid_user' => $request->user[$i],
                    'business_value' => $request->business[$i],
                    'reward_amount' => $request->amount[$i],

                ]);

            }

        }

        return back()->with('success', " Rewards updated successfully");
    }


    public function levelList($id){
        $data['page_title'] = 'Reward levels';
        $data['levels'] = RewardLevel::where('reward_id',$id)->get();


        return view('admin.rewards.rewards_level_list',$data);
    }

    public function levelEdit($id){

        $data = RewardLevel::find($id);

         return response()->json([
            'level' =>$data,
         ]);

    }

    public function levelUpdate(Request $request){

        $request->validate([
            'paid_user' => 'required|integer|max:255',
            'business_value' => 'required|numeric|min:1',
            'reward_amount' => 'required|numeric|min:1',

        ]);

        $id = $request->input('level_id');

        $level = RewardLevel::find($id);
        $level->paid_user = $request->input('paid_user');
        $level->business_value = $request->input('business_value');
        $level->reward_amount = $request->input('reward_amount');
        $level->save();

        return back()->with('success', " Rewards updated successfully");


    }

    public function destroy($id)
    {
        $data = RewardLevel::find($id);
        if (!$data) {
            return back()->with('error', 'Item not found');
        }
        $data->delete();
        return redirect()->back()->with('success', ' Deleted successfully');
    }

}
