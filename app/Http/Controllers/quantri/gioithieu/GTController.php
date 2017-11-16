<?php

namespace App\Http\Controllers\quantri\gioithieu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gioithieu;
use DateTime;

class GTController extends Controller
{
    public function getGT()
    {
    	$data=Gioithieu::get()->toArray();
    	return view('quantri.gioithieu.list',['data'=>$data]);
    }
    public function postGT($id)
    {
    	$gt = Gioithieu::find($id);
    	$gt->link = $_POST['link'];
    	$gt->noidung = $_POST['noidung'];
    	$gt->created_at = new DateTime();
    	$gt->save();
    }
}
