<?php

namespace App\Http\Controllers\website\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gioithieu;
use App\Models\Tuvan;
use App\Models\Sanpham;
use App\Models\Congtrinh;
use App\Models\Lienhe;

class PageController extends Controller
{
    public function page()
    {
    	$url = url('/');
    	$path = url()->current();


    	$cate = Category::where('parent',2)->orWhere('parent',0)->get()->toArray();
    	$pcate = Category::where('parent',3)->get()->toArray();
    	$gioithieu = Gioithieu::get()->toArray();
    	$tuvan = Tuvan::with('user')->with('cat')->where('status',0)->orderBy('id','desc')->paginate(12);
    	$thicong = Tuvan::where('cat_id',5)->with('user')->with('cat')->orderBy('id','desc')->paginate(12);
    	$thietke = Tuvan::where('cat_id',6)->with('user')->with('cat')->orderBy('id','desc')->paginate(12);
    	$sp = Sanpham::with('user')->with('cat')->where('status',0)->orderBy('id','desc')->paginate(12);
    	$congtrinh = Congtrinh::where('status',0)->with('user')->orderBy('id','desc')->paginate(12);
        $lienhe = Lienhe::get()->toArray();
    	// echo "<pre>";
    	// print_r($cate);
    	// echo "</pre>";

    	if($path == $url."/page/".$cate[0]['slug'])
    	{
    		return view('website.page.gioithieu',[
				'cate'      => $cate,
				'gioithieu' => $gioithieu,
                'lienhe' => $lienhe
	    	]);
    	}
    	else if($path  == $url."/page/".$cate[1]['slug'])
    	{
    		return view('website.page.tuvan',[
				'cate'      => $cate,
				'tuvan'     => $tuvan,
                'lienhe' => $lienhe
	    	]);
    	}else if($path == $url."/page/".$cate[4]['slug']){
    		return view('website.page.thicong',[
    			'cate' => $cate,
    			'title' => $cate[4]['name'],
    			'thicong' => $thicong,
                'lienhe' => $lienhe
    		]);
    	}else if($path == $url."/page/".$cate[5]['slug']){
    		return view('website.page.thietke',[
    			'cate' => $cate,
    			'title' => $cate[5]['name'],
    			'thietke' => $thietke,
                'lienhe' => $lienhe
    		]);
    	}else if($path == $url."/page/".$cate[2]['slug']){
    		return view('website.page.sanpham',[
    			'cate' => $cate,
    			'title' => $cate[2]['name'],
    			'sp' => $sp,
    			'pcate' => $pcate,
                'lienhe' => $lienhe
    		]);
    	}else if($path == $url."/page/".$cate[3]['slug']){
    		return view('website.page.congtrinh',[
    			'cate' => $cate,
    			'title' => $cate[3]['name'],
    			'congtrinh' => $congtrinh,
                'lienhe' => $lienhe
    		]); 
    	}
        else if($path == $url."/page/".$cate[6]['slug']){
            return view('website.page.lienhe',[
                'cate' => $cate,
                'title' => $cate[6]['name'],
                'lienhe' => $lienhe
            ]); 
        }
    	
    }

    public function pageCon($id,$slug)
    {
    	$cate = Category::where('parent',2)->orWhere('parent',0)->get()->toArray();
    	$sp = Sanpham::with('cat')->with('user')->where('cat',$id)->get()->toArray();
    	$cates = Category::where('id',$id)->get()->toArray();
    	$pcate = Category::where('parent',3)->get()->toArray();
        $lienhe = Lienhe::get()->toArray();
    	foreach ($cates as $item) {
    		$title = $item['name'];
    	}
    	return view('website.page.page',[
    		'cate' => $cate,
    		'sp' => $sp,
    		'title' => $title,
    		'pcate' => $pcate,
    		'id' => $id,
            'lienhe' => $lienhe
    	]);
    }

    public function pageChitietCongtrinh($slug,$id)
    {
        $cate = Category::where('parent',2)->orWhere('parent',0)->get()->toArray();
        $congtrinh = Congtrinh::where('id',$id)->with('user')->get()->toArray();
        $ranct = Congtrinh::inRandomOrder()->limit(4)->get()->toArray();
        $lienhe = Lienhe::get()->toArray();

        foreach ($congtrinh as $item) {
            $name = $item['name'];
        }

        return view('website.page.pagechitietct',[
            'cate' => $cate,
            'lienhe' => $lienhe,
            'congtrinh' => $congtrinh,
            'name' => $name,
            'ranct' => $ranct
        ]);

    }

    public function pageChitietTuvan($slug,$id)
    {
        $cate = Category::where('parent',2)->orWhere('parent',0)->get()->toArray();
        $tuvan = Tuvan::where('id',$id)->with('user')->get()->toArray();
        $rantv = Tuvan::inRandomOrder()->limit(4)->get()->toArray();
        $lienhe = Lienhe::get()->toArray();

        foreach ($tuvan as $item) {
            $name = $item['name'];
        }

        return view('website.page.pagechitiettv',[
            'cate' => $cate,
            'lienhe' => $lienhe,
            'tuvan' => $tuvan,
            'name' => $name,
            'rantv' => $rantv
        ]);

    }

    public function pageChitietSP($slug,$id)
    {
        $cate = Category::where('parent',2)->orWhere('parent',0)->get()->toArray();
        $lienhe = Lienhe::get()->toArray();
        $sp = Sanpham::where('id',$id)->get()->toArray();
        $ransp = Sanpham::inRandomOrder()->limit(4)->get()->toArray();

        foreach ($sp as $item) {
            $name = $item['name'];
        }


        return view('website.page.pagechitietsp',[
            'cate' => $cate,
            'lienhe' => $lienhe,
            'name' => $name,
            'sp' => $sp,
            'ransp' => $ransp

        ]);

    }


}
