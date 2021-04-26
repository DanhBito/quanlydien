<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\ChucVu;
use APP\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login.login');
    }

    public function checklogin(LoginPost $request){
        $validated = $request->validated();
        
        $username = $request['username'];
        $password = $request['password'];
        $remember = $request['remember'];

        // $this->validate($request,[
        //     'password'=>'min:6|max:32'
        //     ],[
        //     'password.min' => 'Mật Khẩu Phải Trên 6 ký tự',
        //     'password.max' => 'Mật Khẩu Không Quá 32 ký tự'    
        //     ]);

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            # code...

            // $db = DB::table('users')->where('username',$username)->value('id');
            // $nameuser = User::find($db)->nhanvien->toArray();
            // return view('layouts.logo');
            // $nameuser = $nameuser['nv_ten'];
            //  $nameuser= User::find(DB::table('users')->where('username',$username)->value('id'))->nhanvien->toArray();
            //  $cv_ma =  NhanVien::find($nameuser['cv_id'])->chucvu->toArray();
            // var_dump($cv_ma['cv_ma']);die;  
            // $nameuser = $nameuser['nv_ten'];

            $nameuser = User::find(DB::table('users')->where('username',$username)->value('id'))->toArray();
            // var_dump($nameuser);die;
            session()->put($nameuser);
            return redirect(route('home'));
        }else {
            return redirect(route('login'))->with('alert','Sai Tài Khoản Hoặc Mật Khẩu!');
        }
    }

    public function dangXuat(){
        Auth::logout();
        session()->flush();
        return redirect(route('login'));
    }

    public function forget(){
        return view('login.forgetpass');
    }

    public function postforget(Request $request){
        $data = User::where('email', $request->email)->first()->toArray();
        // var_dump($data);die;
        if($data){
            $data['password'] = $data['username'].rand(1000,99999);
            // var_dump($data['id']);die;
            try {
                User::find($data['id'])->update(['password'=> Hash::make($data['password'])]);

                Mail::send('login.sendEmailPass',$data ,function($mail) use($data, $request){
                    $mail->from('abc2012199@gmail.com', 'Support EVN');
                    $mail->to($data['email'], $data['fullname'])->subject('Forget Pass');
                });

                return redirect()->back()->with('alert_success','Mật Khẩu Đã Gửi Đến Email Này!');
            } catch (\Throwable $th) {
                return redirect()->back()->with('alert_error','Không Tìm Thấy Người Dùng Có Email Này!!');
            }
        }else{
            return redirect()->back()->with('alert_error','Không Tìm Thấy Người Dùng Có Email Này!');
        }

        // // var_dump($data->password);die;
        // return redirect(back())->with('alert_success','Mật Khẩu Đã Thay Đổi Thành Công'.$data->password);
    }
}
