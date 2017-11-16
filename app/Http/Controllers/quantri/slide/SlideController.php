<?php

namespace App\Http\Controllers\quantri\slide;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{
    public function getSlide()
    {
    	$data = Slide::get()->toArray();
    	return view('quantri.slide.list',['data'=>$data]);
    }
    public function postSlide()
    {
    	$type = $_FILES['img']['type'];
    	if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
    		$slide = new Slide();
	    	$slide->name = $_POST['name'];
	    	$slide->noidung = $_POST['noidung'];
	    	$slide->status = $_POST['status'];
	    	$slide->created_at = new DateTime();

	    	$path = "image/slide/";
	    	move_uploaded_file($_FILES['img']['tmp_name'],$path.time()."-".$_FILES['img']['name']);
	    	$slide->image = time()."-".$_FILES['img']['name'];
	    	$slide->save();
	    	return 0;
    	}else{
    		return 1;
    	}
        // $img = $_POST['resp'];
        // echo base64_decode($img);
  
    }

    public function editSlide($id)
    {
    	if(isset($_FILES['img'])){
    		$type = $_FILES['img']['type'];
    		if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
    			$slide             = Slide::find($id);
				$slide->name       = $_POST['name'];
				$slide->noidung    = $_POST['noidung'];
				$slide->status     = $_POST['status'];

				$acu = $_POST['acu'];
				$paths = "/image/slide/";
				if(file_exists(public_path().$paths.$acu)){
					File::delete(public_path().$paths.$acu);
				}
				$path = "image/slide/";

				move_uploaded_file($_FILES['img']['tmp_name'],$path.time()."-".$_FILES['img']['name']);
				$slide->image = time()."-".$_FILES['img']['name'];

				$slide->updated_at = new DateTime();
				$slide->save();
				return 0;
    		}else{
    			return 1;
    		}
    		
    	}else{
			$slide             = Slide::find($id);
			$slide->name       = $_POST['name'];
			$slide->noidung    = $_POST['noidung'];
			$slide->status     = $_POST['status'];
			$slide->updated_at = new DateTime();
			$slide->image      = $_POST['acu'];
			$slide->save();
	    	return 0;
    	}
    }

    public function deleteSlide($id)
    {
    	$slide = Slide::find($id);

    	$path = "/image/slide/";
    	if(file_exists(public_path().$path.$slide->image)){
    		File::delete(public_path().$path.$slide->image);
    	}

    	$slide->delete();
    	return redirect()->route('slide')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item success !']);
    }
}
