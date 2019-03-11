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

Route::get('theloai',function(){
    return view('admin.theloai.danhsach');
});

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'theloai'],function(){
        // admin/theloai/danhsach
        Route::get('danhsach','TheLoaiController@getDanhSach');

        Route::get('sua/{id}','TheLoaiController@getSua');
        Route::post('sua/{id}','TheLoaiController@postSua');

        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');

        Route::get('xoa/{id}','TheLoaiController@getXoa');
    });
    Route::group(['prefix'=>'loaitin'],function(){
        // admin/loaitin/danhsach
        Route::get('danhsach','LoaiTinController@getDanhSach');
        Route::get('sua','LoaiTinController@getSua');
        Route::get('them','LoaiTinController@getThem');
    });
    Route::group(['prefix'=>'tintuc'],function(){
        // admin/tintuc/danhsach
        Route::get('danhsach','TinTucController@getDanhSach');
        Route::get('sua','TinTucController@getSua');
        Route::get('them','TinTucController@getThem');
    });
    Route::group(['prefix'=>'user'],function(){
        // admin/user/danhsach
        Route::get('danhsach','TheLoaiController@getDanhSach');
        Route::get('sua','TheLoaiController@getSua');
        Route::get('them','TheLoaiController@getThem');
    });
    Route::group(['prefix'=>'slide'],function(){
        // admin/slide/danhsach
        Route::get('danhsach','TheLoaiController@getDanhSach');
        Route::get('sua','TheLoaiController@getSua');
        Route::get('them','TheLoaiController@getThem');
    });
});
