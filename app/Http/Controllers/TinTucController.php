<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;

class TinTucController extends Controller
{
    public function getDanhSach(){
    	$tintuc = TinTuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

	public function getThem(){
		$theloai = TheLoai::all();
		$loaitin = LoaiTin::all();
		return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }    
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'LoaiTin'=>'required',
            'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required'
        ],[
            'LoaiTin.required'=>"Chưa chọn loại tin",
            'TieuDe.required'=>"Vui lòng nhập tiêu đề",
            'TieuDe.min'=>"Tiêu đề phải có ít nhất 3 ký tự",
            'TieuDe.unique'=>"Tiêu đề đã tồn tại",
            'TomTat.required'=>"Vui lòng nhập tóm tắt",
            'NoiDung.required'=>"Vui lòng nhập nội dung",
        ]);


        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->SoLuotXem = 0;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoiex = $file->getClientOriginalExtension();
            if($duoiex != 'jpg' && $duoiex !='png' && $duoiex !='jpeg')
            {
                return redirect('admin/tintuc/them')->width('thongbao','Vui lòng chọn lại file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            echo $Hinh;
            while (file_exists("upload/images/tintuc".$Hinh)) 
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/images/tintuc",$Hinh);
            $tintuc->Hinh = $Hinh;
        }
        else
        {
            $tintuc->Hinh ="";
        }
        
        $tintuc->save();
        return redirect('admin/tintuc/them')->width('thongbao','Thêm tin thành công');
    }
    public function getSua($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postSua(){

    }
}
