<?php

namespace App\Http\Controllers\quantri\tuvan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tuvan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use DateTime;

class tuController extends Controller
{
    public function getTu()
    {
    	$cate = Category::where('parent',2)->get()->toArray();
    	$data = Tuvan::with('cat')->get()->toArray();
    	return view('quantri.tuvan.list',['cate'=>$cate,'data'=>$data]);
    }
    public function postTu(Request $request)
    {
 
        $type = $_FILES['file']['type'];
        if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png"){
            $tu             = new Tuvan();
            $tu->name       = $_POST['name'];
            $tu->slug       = str_slug($_POST['name']);
            $tu->mota       = $_POST['mota'];
            $tu->noidung    = $_POST['noidung'];
            $tu->status     = $_POST['status'];
            $tu->user_id    = Auth::user()->id;

            $path = "image/upload/";
            move_uploaded_file($_FILES['file']['tmp_name'], $path.time()."-".$_FILES['file']['name']);
            $tu->image = time()."-".$_FILES['file']['name'];

            $tu->cat_id     = $_POST['cat'];
            $tu->created_at = new DateTime();
            $tu->save();
            return 0;
        }else{
            return 1;
        }

    }
    public function editTu($id)
    {
        if(isset($_FILES['file'])){
            $type=$_FILES['file']['type'];
            
            if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png"){
                $tu             = Tuvan::find($id);
                $tu->name       = $_POST['name'];
                $tu->slug       = str_slug($_POST['name']);
                $tu->mota       = $_POST['mota'];
                $tu->noidung    = $_POST['noidung'];
                $tu->status     = $_POST['status'];
                $tu->user_id    = $_POST['user'];

                $anhhientai = $_POST['anhht'];
                $paths = "/image/upload/";
                if(file_exists(public_path().$paths.$anhhientai)){
                    File::delete(public_path().$paths.$anhhientai);
                }

                $path = "image/upload/";
                move_uploaded_file($_FILES['file']['tmp_name'], $path.time()."-".$_FILES['file']['name']);
                $tu->image = time()."-".$_FILES['file']['name'];

                $tu->cat_id     = $_POST['cat'];
                $tu->updated_at = new DateTime();
                $tu->save();
                return 0;
            }else{
                return 1;
            }
        }else{
            $tu             = Tuvan::find($id);
            $tu->name       = $_POST['name'];
            $tu->slug       = str_slug($_POST['name']);
            $tu->mota       = $_POST['mota'];
            $tu->noidung    = $_POST['noidung'];
            $tu->status     = $_POST['status'];
            $tu->user_id    = $_POST['user'];

            $anhhientai = $_POST['anhht'];

            $tu->image = $anhhientai;

            $tu->cat_id     = $_POST['cat'];
            $tu->updated_at = new DateTime();
            $tu->save();
            return 0;
        }
    	
    }

    public function deleteTu($id)
    {
        $tu = Tuvan::find($id);
        $path="/image/upload/";
        if(file_exists(public_path().$path.$tu->image)){
            File::delete(public_path().$path.$tu->image);
        }
        $tu->delete();
        return redirect()->route('tuvan')->with(['flash_level'=>'result_msg','flash_message'=>'Delete item success !']);
    }
}
