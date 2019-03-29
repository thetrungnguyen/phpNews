<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('test',function(){
    $theloai = TheLoai::find(1);
    foreach($theloai->loaitin as $loaitin){
        echo $loaitin->Ten."<br>";
    }
});
//set đường dẫn gọi hàm function bên controller lên trang chủ
Route::get('trangchu','PageController@trangchu');
Route::get('lienhe','PageController@lienhe');
Route::get('loaitin/{id}/{TenKhongDau}.html','PageController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PageController@tintuc');

Route::post('timkiem','PageController@timkiem');

