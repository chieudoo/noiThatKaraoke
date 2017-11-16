<?php

namespace App\Http\Controllers\quantri\role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RoleController extends Controller
{
    public function getRole()
    {
    	$data = User::get()->toArray();
    	return view('quantri.role.list',['data'=>$data]);
    }
}
