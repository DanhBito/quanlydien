<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('login.login');
})->name('login')->middleware('middlewareLogin');

Route::post('checklogin', 'LoginController@checklogin')->name('checklogin');

Route::get('dangxuat', 'LoginController@dangXuat')->name('dangxuat');

Route::get('home', function () {
    return view('layouts.main');
})->name('home')->middleware('middlewareCheckLogin');

Route::get('doimatkhau','DoiMatKhauController@index')->name('doimatkhau')->middleware('middlewareCheckLogin');
Route::post('checkDoiMatKhau', 'DoiMatKhauController@checkDoiMatKhau')->name('checkDoiMatKhau');

Route::get('dangky','DangKyController@index')->name('dangky')->middleware('middlewareCheckLogin');
Route::post('checkDangKy', 'DangKyController@checkDangKy' )->name('checkDangKy');

Route::get('thongtincongty', 'ThongTinCongTyController@index')->name('thongtincongty');
Route::get('suathongtincty', 'ThongTinCongTyController@suathongtincty')->name('suathongtincty');
Route::post('updatethongtincty', 'ThongTinCongTyController@updatethongtincty')->name('updatethongtincty');

// Route::prefix('hethong')->middleware('middlewareCheckLogin')->group(function () {
//     Route::get('doimatkhau', 'HeThongController@doimatkhau');

//     Route::get('phanquyen', 'HeThongController@phanquyen');

//     Route::get('suathongtin', 'HeThongController@suathongtin');

//     Route::get('taotaikhoan', 'HeThongController@taotaikhoan');

//     Route::get('thongtin', 'HeThongController@thongtin');
// });

Route::prefix('danhmuc')->middleware('middlewareCheckLogin')->group(function () {
    Route::prefix('khuvuc')->group(function () {
        Route::get ('index',        'KhuVucController@index')              ->name('khuvuc');
        Route::get ('update/{id}',  'KhuVucController@updatedistrict')     ->name('updatedistrict');
        Route::post('update/{id}',  'KhuVucController@postupdatedistrict') ->name('postupdatedistrict');
        Route::get ('delete/{id}',  'KhuVucController@deletedistrict')     ->name('deletedistrict');
        Route::get ('insert',       'KhuVucController@insertdistrict')     ->name('insertdistrict');
        Route::post ('insert',      'KhuVucController@postinsertdistrict') ->name('postinsertdistrict');
    });
    
    Route::prefix('nhanvien')->group(function () {
        Route::get('index',           'NhanVienController@index')->name('nhanvien');
        Route::get('viewuser/{id}',   'NhanVienController@viewuser') ;
        Route::get('updateuser/{id}', 'NhanVienController@getupdateuser');
        Route::post('postupdateuser', 'NhanVienController@postupdateuser');
        Route::get('delete/{id}',     'NhanVienController@deleteuser');
        Route::post('search',          'NhanVienController@search') ;
        Route::get('autocomplete',    'NhanVienController@autocomplete')->name('autocomplete');
    });

    Route::prefix('nhasanxuat')->group(function () {
        Route::get('index',              'NhaSanXuatController@index')->name('nhasanxuat');
        Route::get('edit/{id}',          'NhaSanXuatController@getedit');
        Route::post('postupdatproducer', 'NhaSanXuatController@postupdatproducer');
        Route::get('delete/{id}',        'NhaSanXuatController@deleteproducer');
        Route::post('insert',            'NhaSanXuatController@insert')->name('inserproducer');
    });
});


Route::prefix('chucnang')->middleware('middlewareCheckLogin')->group(function () {
    Route::prefix('baocao')->group(function () {
        //chucnag/baocao/....
        Route::get('chatluong','BaocaoController@bcChatLuong');

        Route::get('khohang','BaocaoController@bcKhoHang');

        Route::get('nhasx','BaocaoController@bcNhaSx');

        Route::get('vattu','BaocaoController@bcNhomVt');
    });

    Route::prefix('nhapkho')->group(function () {
        //chucnag/nhapkho/....
        Route::get('danhsach','NhapKhoController@danhsach');

        Route::get('them','NhapKhoController@them');

        Route::get('sua','NhapKhoController@sua');
    });

    Route::prefix('xuatkho')->group(function () {
        //chucnag/nhapkho/....
        Route::get('danhsach','XuatKhoController@danhsach');

        Route::get('xuatkho','XuatKhoController@xuatkho');

        Route::get('sua','XuatKhoController@sua');
    });

    Route::get('thongke','ThongKeController@danhsach');
});

Route::get('demo', function () {
    $data = App\User::find(1)->nhanvien->toArray();
    var_dump($data);
});

Route::get('abc', function(){
    return view('getdata');
})->name('abc')->middleware('middlewareCheckLogin');


// Route::get('login', 'LoginController@index',function(){
//     session()->flush();
// })->name('login');



