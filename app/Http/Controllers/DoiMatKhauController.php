<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\ChangePasswordPost;

class DoiMatKhauController extends Controller
{
    //
    public function index(){
        return view('hethong.doimatkhau');
    }

    public function checkDoiMatKhau(ChangePasswordPost $request){
        $validated = $request->validated();
        // $pass_old = $request['password_old'];
        // $pass_new = $request['password_new'];
        // $pass_confirm = $request['password_confirm'];

//         $this->validate($request,[
//             'password_new'=>'min:6|max:32',
//             'password_old'=>'min:6|max:32',
//             'password_confirm'=>'same:password_new',
//             ],[
//             'password_new.min' => 'Mật Khẩu Mới Phải Trên 6 ký tự',
//             'password_new.max' => 'Mật Khẩu Mới Không Quá 32 ký tự',  
//             'password_old.min' => 'Mật Khẩu Phải Trên 6 ký tự',
//             'password_old.max' => 'Mật Khẩu Không Quá 32 ký tự',  
//             'password_confirm.same' => 'Nhập Lại Mật Khẩu Không Trùng Khớp'
//             ]);
// // var_dump(!Hash::check($request->password_old, $request->user()->password));die;
        if(Hash::check($request->password_old, $request->user()->password)) {
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password_new)]);
            // var_dump(User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password_new)]));die;
            return redirect(route('doimatkhau'))->with('alert_success','Thay Đổi Mật Khẩu Thành Công!');
        }else{
            // var_dump($request->user()->password);die;
            return redirect(route('doimatkhau'))->with('alert_error','Sai Tài Khoản Hoặc Mật Khẩu!');
        }

        // $request->validate([
        //     'password_old' => ['required'],
        //     'password_new' => ['required'],
        //     'password_confirm' => ['same:password_new'],    
        // ]);

        // User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        // var_dump('thành công');die;

        // if(!(Hash::check($pass_old, auth()->user()->password))){
        //     var_dump('abc');die;
        // }else{
        //     var_dump($pass_old);die;
        // }

        // if(Auth::attempt(['username'=>$username, 'password' => $pass_old])){
        //     var_dump('abc');die;
        // }else{
        //     var_dump($pass_old);die;
        // }
    }
}
