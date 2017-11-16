<?php

namespace App\Http\Controllers\quantri\danhmuc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use DateTime;

class cateController extends Controller
{
	public function getCate()
    {
    	$data=Category::get()->toArray();
    	return view('quantri.danhmuc.list',['data'=>$data]);
    }

    public function postCate(Request $request)
    {
		$cate             = new Category();
		$cate->name       = $_POST['name'];
		$cate->slug       = str_slug($_POST['name'],'-');
		$cate->parent     = $_POST['parent'];
		$cate->status     = $_POST['status'];
		$cate->created_at = new DateTime();
		$cate->save();
    	// return redirect()->route('danhmuc')->with(['flash_level'=>'result_msg','flash_message'=>'Thêm Thành Công']);
    }

    public function editCate($id,Request $request)
    {
		$cate             = Category::find($id);
		$cate->name       = $_POST['name'];
		$cate->slug       = str_slug($_POST['name'],'-');
		$cate->parent     = $_POST['parent'];
		$cate->status     = $_POST['status'];
		$cate->updated_at = new DateTime();
		$cate->save();
    }

    public function deleteCate($id)
    {
    	$cate = Category::find($id);
    	$cate->delete();
    	return redirect()->route('danhmuc')->with(['flash_level'=>'result_msg','flash_message'=>'Xóa Thành Công']);

    }
}
