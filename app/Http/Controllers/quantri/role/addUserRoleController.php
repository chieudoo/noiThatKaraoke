<?php

namespace App\Http\Controllers\quantri\role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\AddUserRole;
use DateTime;

class addUserRoleController extends Controller
{
   	public function addUserRole()
    {
    	$data = Role::get()->toArray();
    	$user = User::where('id','!=',1)->get()->toArray();
    	return view('quantri.role.add',['data'=>$data,'user'=>$user]);
    }
    public function postAddUserRole()
    {
    	$add = new AddUserRole();
    	$add->role_id = $_POST['role'];
    	$add->user_id = $_POST['user'];
    	$add->created_at = new DateTime();
    	$add->save();
    	echo "success";
    }
}
