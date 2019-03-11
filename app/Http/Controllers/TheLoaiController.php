<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
    	//biến lưu danh sách thể loại
    	$theloai = TheLoai::all();
    	//truyền danh sách thể loại ra view để hiển thị
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

	public function getThem(){
		return view('admin.theloai.them');
    }    	

    public function postThem(Request $req){
    	//kiểm tra giá trị nhập vào. Mảng đầu tiên là các lỗi, mảng thứ 2 là các thông báo tương ứng
    	$this->validate($req,
    		[
    			'txtCateName' => 'required|min:3|max:100' //required: tên rỗng
    		],
    		[
    			'txtCateName.required' => 'Tên bị rỗng', 
    			'txtCateName.min' => 'Tên từ 3 đến 100 ký tự',
    			'txtCateName.max' => 'Tên quá 100 ký tự'
    		]);

    	//lưu data vào database
    	$theloai = new TheLoai;
    	//Gán dữ liệu cho cột Tên bằng dữ liệu nhận được từ form
    	$theloai->Ten = $req->txtCateName;
    	//Chuyển thành chuỗi không dấu lưu vào cột TenKhongDau
    	$theloai->TenKhongDau = changeTitle($req->txtCateName);
    	//echo changeTitle($req->txtCateName);
    	//$theloai->created_at = strtotime("today");

    	//Lưu thay đổi
    	$theloai->save();
    	//Quay lại trang danh sách thể loại
    	return redirect('admin/theloai/danhsach') -> with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	//Tìm dòng muốn sửa trong CSDL
    	$theloai = TheLoai::find($id);
    	//truyền dữ liệu tìm được ở trên sang trang chỉnh sửa
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    
    public function postSua(Request $req, $id){
    	$theloai = TheLoai::find($id);
    	$this->validate($req,
    		[
    			'txtCateName' => 'required|min:3|max:100' //required: tên rỗng
    		],
    		[
    			'txtCateName.required' => 'Tên bị rỗng', 
    			'txtCateName.min' => 'Tên từ 3 đến 100 ký tự',
    			'txtCateName.max' => 'Tên quá 100 ký tự'
    		]);
    	$theloai = TheLoai::find($id);
    	$theloai->Ten = $req->txtCateName;
    	$theloai->TenKhongDau = changeTitle($req->txtCateName);
    	$theloai->save();

    	return redirect('admin/theloai/danhsach')-> with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$theloai = TheLoai::find($id);
    	$theloai->delete();

    	return redirect('admin/theloai/danhsach') -> with('thongbao','Xóa thành công');
    }
}
