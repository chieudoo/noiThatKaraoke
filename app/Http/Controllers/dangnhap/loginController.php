<?php

namespace App\Http\Controllers\dangnhap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
	public function getUser()
    {
    	$data = User::get();
    	return $data;
    }

    public function getLogin()
    {
    	return view('dangnhap.login');
    }

    public function postLogin(Request $request)
    {
    	$email=$_POST['e'];
    	$pass=$_POST['p'];

    	$user=[
			'email'    => $email,
			'password' => $pass,
			'level'    => 0
    	];

    	if(Auth::attempt($user)){
    		return 0;
    	}else{
    		return 1;
    	}
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('dang-nhap');
    }
}
