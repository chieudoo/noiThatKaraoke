<?php

namespace App\Http\Controllers\quantri\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;

class editUserController extends Controller
{
    public function getEditUser($id)
    {
        $data = User::where('id',$id)->get()->toArray(); 
        return view('quantri.user.edit',['data'=>$data,'id'=>$id]);
    }
    public function postEditUser($id,Request $request)
    {
    	

    	if(filter_var($request->email,FILTER_VALIDATE_EMAIL) && strlen($request->password) >= 8){
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->updated_at = new DateTime();
            $user->save();
            return redirect()->route('user')->with(['flash_level'=>'result_msg','flash_message'=>'Edit success']);
        }else{
        	return redirect()->back()->with(['flash_level'=>'result_msg','flash_message'=>'Có lỗi xảy ra']);
        }
        
    }
}
