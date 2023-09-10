<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    //
    public function Index(){
        $data['page_title'] = 'All Users';

        return view('admin.manage_user.all_users',$data);
    }
}
