<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slide;
use App\Models\Gioithieu;
use App\Models\Congtrinh;
use App\Models\Sanpham;
use App\Models\Tuvan;
use App\Models\Lienhe;

class homeController extends Controller
{
    public function index()
    {
    	$cate = Category::where('parent',2)->orWhere('parent',0)->get()->toArray();
    	$slide = Slide::get()->toArray();
    	$gioithieu =  Gioithieu::get()->toArray();
    	$congtring = Congtrinh::with('user')->where('status',0)->limit(6)->orderBy('id','desc')->get()->toArray();
    	$tuvan = Tuvan::with('user')->with('cat')->where('status',0)->limit(6)->orderBy('id','desc')->get()->toArray();
        $lienhe = Lienhe::get()->toArray();
    	return view('website.home.main',
    		[
    			'cate'=>$cate,
    			'slide'=>$slide,
    			'gioithieu' => $gioithieu,
    			'congtrinh' => $congtring,
    			'tuvan' => $tuvan,
                'lienhe' => $lienhe
    		] 
    	);
    }

    public function timkiem($key)
    {
        
        $serch = Sanpham::where('name','LIKE','%'.$key.'%')->get()->toArray();

        if(count($serch) == 0){
            echo "<li><a href='#'>Không tìm thấy kết quả</a></li>";
        }else{
            foreach ($serch as $item) {
                echo "<li><a href=''>".$item['name']."</a></li>";
            }
        }
        

    }
}
