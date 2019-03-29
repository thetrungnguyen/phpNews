<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getDanhSach(){
    	//biến lưu danh sách loại tin
    	$slide = Slide::all();
    	//truyền danh sách thể loại ra view để hiển thị
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem(){
		return view('admin.slide.them');
    }    

    public function postThem(Request $request){
    	//kiểm tra giá trị nhập vào. Mảng đầu tiên là các lỗi, mảng thứ 2 là các thông báo tương ứng
    	$this->validate($request,
    		[
    			'txtName' => 'required|min:3|max:100' //required: tên rỗng
    		],
    		[
    			'txtName.required' => 'Tên bị rỗng', 
    			'txtName.min' => 'Tên từ 3 đến 100 ký tự',
    			'txtName.max' => 'Tên quá 100 ký tự'
    		]);

    	//lưu data vào database
    	$slide = new Slide;
    	$slide->Ten = $request->txtName;
    	if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoiex = $file->getClientOriginalExtension();
            if($duoiex != 'jpg' && $duoiex !='png' && $duoiex !='jpeg')
            {
                return redirect('admin/slide/them')->with('thongbao','Vui lòng chọn lại file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            echo $Hinh;
            while (file_exists("upload/images/".$Hinh)) 
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/images/",$Hinh);
            $slide->Hinh = $Hinh;
        }
        else
        {
            $slide->Hinh ="??";
        }

    	//Gán dữ liệu cho cột Tên bằng dữ liệu nhận được từ form
    	
    	//Chuyển thành chuỗi không dấu lưu vào cột TenKhongDau
    	$slide->save();
    	//Quay lại trang danh sách thể loại
    	return redirect('admin/slide/danhsach') -> with('thongbao','Thêm thành công');
    }

    public function getXoa($id){
    	$slide = Slide::find($id);
    	$slide->delete();

    	return redirect('admin/slide/danhsach') -> with('thongbao','Xóa thành công');
    }

    public function getSua($id){
    	$slide = Slide::find($id);
    	//truyền dữ liệu tìm được ở trên sang trang chỉnh sửa
    	return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request,$id){
    	$this->validate($request,
    		[
    			'txtName' => 'required|min:3|max:100' //required: tên rỗng
    		],
    		[
    			'txtName.required' => 'Tên bị rỗng', 
    			'txtName.min' => 'Tên từ 3 đến 100 ký tự',
    			'txtName.max' => 'Tên quá 100 ký tự'
    		]);

    	//lưu data vào database
    	$slide =  Slide::find($id);
    	$slide->Ten = $request->txtName;
    	if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoiex = $file->getClientOriginalExtension();
            if($duoiex != 'jpg' && $duoiex !='png' && $duoiex !='jpeg')
            {
                return redirect('admin/slide/them')->with('thongbao','Vui lòng chọn lại file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            echo $Hinh;
            while (file_exists("upload/images/".$Hinh)) 
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/images/",$Hinh);
            $slide->Hinh = $Hinh;
        }
        else
        {
            $slide->Hinh ="??";
        }

    	//Gán dữ liệu cho cột Tên bằng dữ liệu nhận được từ form
    	
    	//Chuyển thành chuỗi không dấu lưu vào cột TenKhongDau
    	$slide->save();
    	//Quay lại trang danh sách thể loại
    	return redirect('admin/slide/danhsach') -> with('thongbao','Sửa thành công');
    }
}
