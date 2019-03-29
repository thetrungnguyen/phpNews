<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
class PageController extends Controller
{
	function __construct()
	{
		//khởi tạo biến sử dụng cho toàn source
		$theloai = TheLoai::all();
		$slide = Slide::all();
		view()->share('theloai',$theloai);
		view()->share('slide',$slide);
	}
    //gọi hàm load mục thể loại lên trang chủ
    function trangchu()
    {
    	
    	return view('pages.trangchu');
    }
    function lienhe()
    {
    	
    	return view('pages.lienhe');
    }
    function loaitin($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function tintuc($id)
    {
        $tintuc =TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan =TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
    function timkiem(Request $request)
    {
        $tukhoa = $request ->tukhoa;
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(30)->paginate(5);
        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }
}
