<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //Khai báo tên bảng chứa dữ liệu
    protected $table = "TheLoai";
    //Tạo liên kết giữa các model (Do các bảng trog database có liên kết)
    public function loaitin(){
        //app/LoaiTin là model; idTheLoai: khóa phụ; id:Khóa chính
        return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }

    //Lấy tin tức thuộc loại tin hiện tại
    public function tintuc(){
        //TinTuc <~> LoaiTin <~> TheLoai    idTheLoai: Khoa phu cua bang LoaiTin,      idLoaiTin: Khoa phu cua bang TinTuc
        return $this->hasManyThrough('App\TinTuc','app\LoaiTin','idTheLoai','idLoaiTin','id');
    }
}
