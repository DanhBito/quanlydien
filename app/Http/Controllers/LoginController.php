<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\ChucVu;
use APP\NhanVien;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login.login');
    }

    public function checklogin(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        $remember = $request['remember'];

        $this->validate($request,[
            'password'=>'min:6|max:32'
            ],[
            'password.min' => 'Mật Khẩu Phải Trên 6 ký tự',
            'password.max' => 'Mật Khẩu Không Quá 32 ký tự'    
            ]);

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            # code...

            // $db = DB::table('users')->where('username',$username)->value('id');
            // $nameuser = User::find($db)->nhanvien->toArray();
            // return view('layouts.logo');
            // $nameuser = $nameuser['nv_ten'];
             $nameuser= User::find(DB::table('users')->where('username',$username)->value('id'))->nhanvien->toArray();
             $cv_ma =  NhanVien::find($nameuser['cv_id'])->chucvu->toArray();
            // var_dump($cv_ma['cv_ma']);die;  
            // $nameuser = $nameuser['nv_ten'];
            session()->put( $nameuser);
            return redirect(route('home'));
        }else {
            return redirect(route('login'))->with('thongbao','Sai Tài Khoản Hoặc Mật Khẩu!');
        }
    }

    public function dangXuat(){
        Auth::logout();
        session()->flush();
        return redirect(route('login'));
    }
}
