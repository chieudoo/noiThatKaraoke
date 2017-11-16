<?php

namespace App\Http\Controllers\quantri\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use DateTime;


class UserController extends Controller
{
    public function getUser()
    {
    	$data=User::get()->toArray();
    	return view('quantri.user.list',['data'=>$data]);
    }
    public function postUser()
    {
    	if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    		$user = new User();
    		$user->name = $_POST['name'];
    		$user->email = $_POST['email'];
    		$user->password = bcrypt($_POST['pass']);
    		$user->created_at = new DateTime();
    		$user->save();
    		return 0;
    	}else{
    		return 1;
    	}
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user')->with(['flash_level'=>'result_msg','flash_message'=>'Delete success']);
    }

    


}
