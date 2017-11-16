<?php

namespace App\Http\Controllers\quantri\sanpham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sanpham;
use DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class SanController extends Controller
{
    public function getSan()
    {
    	$data=Sanpham::with('cat')->get()->toArray();
    	// echo "<pre>";
    	// print_r($data);
    	// echo "</pre>";
    	$cat=Category::where('parent',3)->get()->toArray();
    	return view('quantri.sanpham.list',['cat'=>$cat,'data'=>$data]);
    }
    public function postSan()
    {
    	$type=$_FILES['img']['type'];
    	if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
			$san             = new Sanpham();
			$san->name       = $_POST['name'];
			$san->slug       = str_slug($_POST['name']);
			$san->cat        = $_POST['cat'];
			$san->mota       = $_POST['mota'];
			$san->noidung    = $_POST['noidung'];
			$san->status     = $_POST['status'];
			$san->user_id    = Auth::user()->id;
			
			$path            = "image/";
			move_uploaded_file($_FILES['img']['tmp_name'],$path.time()."-".$_FILES['img']['name']);
			$san->image      = time()."-".$_FILES['img']['name'];
			
			$san->created_at = new DateTime();
	    	$san->save();
	    	return 0;
    	}else{
    		return 1;
    	}
    	

    }

    public function editSan($id)
    {
    	if(isset($_FILES['img'])){
    		$type=$_FILES['img']['type'];
	    	if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
				$san             = Sanpham::find($id);
				$san->name       = $_POST['name'];
				$san->slug       = str_slug($_POST['name']);
				$san->cat        = $_POST['cat'];
				$san->mota       = $_POST['mota'];
				$san->noidung    = $_POST['noidung'];
				$san->status     = $_POST['status'];
				$san->user_id    = Auth::user()->id;
				
				$path            = "image/";
				$paths           = "/image/";
				$anhcu 			 = $_POST['anhcu'];
				if(file_exists(public_path().$paths.$anhcu)){
					File::delete(public_path().$paths.$anhcu);
				}

				move_uploaded_file($_FILES['img']['tmp_name'],$path.time()."-".$_FILES['img']['name']);
				$san->image      = time()."-".$_FILES['img']['name'];
				
				$san->updated_at = new DateTime();
		    	$san->save();
		    	return 0;
	    	}else{
	    		return 1;
	    	}
    	}else{
			$san             = Sanpham::find($id);
			$san->name       = $_POST['name'];
			$san->slug       = str_slug($_POST['name']);
			$san->cat        = $_POST['cat'];
			$san->mota       = $_POST['mota'];
			$san->noidung    = $_POST['noidung'];
			$san->status     = $_POST['status'];
			$san->user_id    = Auth::user()->id;
			$san->image      = $_POST['anhcu'];
			
			$san->updated_at = new DateTime();
	    	$san->save();

	    	return 0;
    	}
		
    }

    public function deleteSan($id)
    {
    	$san = Sanpham::find($id);
    	$path = "/image/";
    	if(file_exists(public_path().$path.$san->image)){
    		File::delete(public_path().$path.$san->image);
    	}
    	$san->delete();

    	return redirect()->route('sanpham')->with(['flash_level'=>'result_msg','flash_message'=>'Delete success !']);
    }
}
