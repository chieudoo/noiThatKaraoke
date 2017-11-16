<?php

namespace App\Http\Controllers\quantri\congtrinh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Congtrinh;
use DateTime;

class congController extends Controller
{
    public function getCong()
    {
    	$data = Congtrinh::get()->toArray();
    	return view('quantri.congtrinh.list',['data'=>$data]);
    }
    public function postCong()
    {
		$cong             = new Congtrinh();
		$cong->name       = $_POST['name'];
		$cong->slug       = str_slug($_POST['name']);
		$cong->text       = $_POST['mota'];
		$cong->noidung    = $_POST['noidung'];
		$cong->link       = $_POST['link'];
		$cong->cat_id     = 4;
        $cong->user_id    = Auth::user()->id;
		$cong->status     = $_POST['status'];
		$cong->created_at = new DateTime();
    	$cong->save();
    }

    public function editCong($id)
    {
		$cong             = Congtrinh::find($id);
		$cong->name       = $_POST['name'];
		$cong->slug       = str_slug($_POST['name']);
		$cong->text       = $_POST['mota'];
		$cong->noidung    = $_POST['noidung'];
		$cong->link       = $_POST['link'];
        $cong->user_id    = $_POST['user'];
		$cong->cat_id     = 4;
		$cong->status     = $_POST['status'];
		$cong->updated_at = new DateTime();
    	$cong->save();
    }
    public function deleteCong($id)
    {
    	$cong             = Congtrinh::find($id);
    	$cong->delete();
    	return redirect()->route('congtrinh')->with(['flash_level'=>'result_msg','flash_message'=>'Xóa Thành Công']);
    }
}
