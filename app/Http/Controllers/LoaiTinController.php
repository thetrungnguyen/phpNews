<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class LoaiTinController extends Controller
{
   public function getDanhSach(){
    	//biến lưu danh sách loại tin
    	$loaitin = LoaiTin::all();
    	//truyền danh sách thể loại ra view để hiển thị
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

	public function getThem(){
		//danh sách thể loại trong combobox
		$theloai = TheLoai::all();
		return view('admin.loaitin.them',['theloai'=>$theloai]);
    }    	

    public function postThem(Request $req){
    	//Kiẻm tra giá trị nhập vào. Dữ liệu lưu trong biến $req; mảng đầu tiên chứa các lỗi, mảng thứ 2 chứa các thông báo tương ứng
    	$this->validate ($req,
    		[
    			//Tên phải được nhập và không được trùng với dữ liệu ở bảng LoaiTin
    			'txtTen'=>'required | min:1 | max:100 '
    			
    		],
    		[
    			'txtTen.required' => 'Thiếu tên loại tin',
    			'txtTen.min' => 'Quá ít ký tự',
    			'txtTen.max' => 'Quá nhiều ký tự'
    			//In thể loại ở trang them.blade.php mục if errors
    		]);
    	//Tạo mới LoaiTin để lưu vào database
    	$loaitin = new LoaiTin;
    	$loaitin->Ten=$req->txtTen;
    	$loaitin->TenKhongDau = changeTitle($req->Ten);
    	$loaitin->idTheLoai = $req->idTheLoai;
    	$loaitin->save();
    	//Sau khi thêm thì quay lại trang danh sách kèm thông báo
    	return redirect('admin/loaitin/danhsach') -> with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::find($id);
    	return view('admin.loaitin.sua',['loaitin' => $loaitin,'theloai' => $theloai]);
    }
    
    public function postSua(Request $req, $id){
    	$this->validate ($req,
    		[
    			//Tên phải được nhập và không được trùng với dữ liệu ở bảng LoaiTin
    			'Ten'=>'required | min:1 | max:100 '
    			
    		],
    		[
    			'Ten.required' => 'Thiếu tên loại tin',
    			'Ten.min' => 'Quá ít ký tự',
    			'txtTen.max' => 'Quá nhiều ký tự'
    			//In thể loại ở trang them.blade.php mục if errors
    		]);
    	$loaitin = LoaiTin::find($id);
    	$loaitin->Ten = $req -> Ten;
    	$loaitin->TenKhongDau = changeTitle($req->Ten);
    	$loaitin->idTheLoai = $req->TheLoai;
    	$loaitin->save();
    	return redirect('admin/loaitin/danhsach')->with('thongbao','Thao tác thành công!');
    }

    public function getXoa($id){
    	
    }
}
