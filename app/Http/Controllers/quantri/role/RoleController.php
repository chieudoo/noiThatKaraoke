<?php

namespace App\Http\Controllers\quantri\role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use DateTime;


class RoleController extends Controller
{
    public function getRole()
    {
    	$data = Role::get()->toArray();
    	return view('quantri.role.list',['data'=>$data]);
    }
    public function postRole()
    {
    	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	$role = new Role();
    	$role->name = $_POST['name'];
    	$role->role = str_shuffle($str);
    	$role->role_add = $_POST['them'];
    	$role->role_edit = $_POST['sua'];
    	$role->role_delete = $_POST['xoa'];
    	$role->created_at = new DateTime();
    	$role->save();
    	return 0;
    }
    
}
