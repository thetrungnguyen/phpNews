<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//Tao model bang cach mo CMD: php artisan make:model TenModel
class Comment extends Model
{
    //Khai báo tên bảng
    protected $table ="Comment";
    
    //Tạo liên kết giữa các model (Do các bảng trog database có liên kết)
    public function tintuc(){
        return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }

    //Lấy thông tin user từ comment
    public function user(){
        return $this->belongsTo('App\User','idUser','id');
    }
}
