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

Route::get('trangchu',function(){
    return view('pages.trangchu');
});

Route::get('thu',function(){
	return view('admin.theloai.danhsach');
});

