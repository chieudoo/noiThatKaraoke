<?php

namespace App\Http\Controllers\quantri\lienhe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lienhe;
use DateTime;
use Illuminate\Support\Facades\File;

class lienheController extends Controller
{
    public function getLien()
    {
    	$data = Lienhe::get()->toArray();
    	return view('quantri.lienhe.list',['data'=>$data]);
    }
    public function postLien($id)
    {
    	if(isset($_FILES['img'])){
    		$type =  $_FILES['img']['type'];
    		if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
    			$lien = Lienhe::find($id);
    			$lien->noidung = $_POST['noidung'];
    			$lien->face = $_POST['face'];

    			$paths = "/image/logo/";
    			$acu = $_POST['acu'];
    			if(file_exists(public_path().$paths.$acu)){
    				File::delete(public_path().$paths.$acu);
    			}


    			$path = "image/logo/";
    			move_uploaded_file($_FILES['img']['tmp_name'],$path.time()."-".$_FILES['img']['name']);
    			$lien->logo = time()."-".$_FILES['img']['name'];

    			
    			$lien->updated_at = new DateTime();
    			$lien->save();
    			return 0;
    		}else{
    			return 1;
    		}
    		

    	}else{
    		$lien = Lienhe::find($id);
			$lien->noidung = $_POST['noidung'];
			$lien->face = $_POST['face'];
			$lien->logo = $_POST['acu'];
			$lien->updated_at = new DateTime();
			$lien->save();
			return 0;
    	}
    	
    }
}
