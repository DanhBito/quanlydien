<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ChucVu;
use App\NhanVien;
use Illuminate\Support\Facades\DB;

class DangKyController extends Controller
{
    //
    public function stripVN($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
    
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);

        // $str = preg_replace('/[^A-Za-z0-9\-]/','', $str);

        // $str = strtolower($str).rand(0,99999);
        return $str;
    }

    public function index(){
        return view('hethong.taotaikhoan');
    }

    public function checkDangKy(Request $request)
    {
        # code...
        $this->validate($request,[
            'cmnd' => 'digits:10',
            'birth' => 'before:2015-01-01',
            'phone_number' => 'digits:10|starts_with:0',
            'date_joining' => 'before:today',
            'password'=>'min:6|max:32',
            'password_confirm'=>'same:password',
            ],[
            'cmnd.digits'=> 'Bạn Nhập Số Chứng Minh Nhân Dân Phải Đủ 10 Số !' ,
            'birth' => 'Ngày Sinh Phải Trước Ngày 01-01-2015',
            'phone_number.digits' => 'Bạn Nhập Số Điện Thoại Phải Đủ 10 Số !',
            'phone_number.starts_with'=> 'Số Điện Thoại Phải Bắt Đầu Bằng Số 0',
            'date_joining.before' => 'Ngày Vào Làm Phải Trước Ngày Hôm Nay !',
            'password.min' => 'Mật Khẩu Mới Phải Trên 6 Ký Tự !',
            'password.max' => 'Mật Khẩu Mới Không Quá 32 Ký Tự !',   
            'password_confirm.same' => 'Nhập Lại Mật Khẩu Không Trùng Khớp'
            ]);

        if ($request->position === 'admin') {
            # code...
            $cv_id = 1;
        }elseif ($request->position === 'lanhdao') {
            # code...
            $cv_id = 2;
        }elseif ($request->position === 'quanli') {
            # code...
            $cv_id = 3;
        }elseif ($request->position === 'nhanvien') {
            # code...
            $cv_id = 4;
        }

        $fullname =$this->stripVN($request->fullname) ;
        $id_rand = rand(0,9999999); 
        $nv_ma = 'nv'.$id_rand;
        // $nv_id = DB::table('nhanvien')->where('nv_ma','nv1')->value('id');
        // var_dump($nv_id);die;
        // $nv_id = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $request->fullname)).rand(00,99999);
// var_dump($request->email);die;
        // var_dump($fullname);die;
        // var_dump(rand(00,99999));die;
        try {
            //code...
            $nhanvien = NhanVien::create([
                'nv_ma' =>$nv_ma,
                'nv_ten'=> $request->fullname,
                'nv_gioitinh' => $request->gender,
                'nv_ngaysinh' => $request->birth,
                'nv_diachi' => $request->address,
                'nv_cmnd'=>$request->cmnd,
                'nv_sdt'=>$request->phone_number,
                'nv_email'=>$request->email,
                'nv_ngayvaolam' =>$request->date_joining,
                'cv_id' => $cv_id,
            ]);
    
            $nhanvien->save();

            try {
                //code...
                $nv_id = DB::table('nhanvien')->where('nv_ma',$nv_ma)->value('id');
                $user = User::create([
                    'username' => 'user'.$id_rand,
                    'password' => bcrypt($request->password),
                    'nv_id' => $nv_id,
                    'remember_token' => $request->_token,
                ]);

                $user->save();

                return redirect(route('dangky'))->with('thongbao','Thêm Người Dùng Thành Công!');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect(route('dangky'))->with('thongbao','Thêm Người Dùng Thất Bại!');
            }

        } catch (\Exception $e) {
            //throw $th;
            var_dump($e.'abc');die;
            return redirect(route('dangky'))->with('thongbao','Thêm Người Dùng Thất Bại!');
        }
        
        // try {
        //     //code...
        //     $nv_id = DB::table('nhanvien')->where('nv_ma','nv2618816')->value('id');
        //     $user = User::create([
        //         'username' => 'user2618816',
        //         'password' => bcrypt($request->password),
        //         'nv_id' => $nv_id,
        //         'remember_token' => $request->_token,
        //     ]);

        //     $user->save();

        //     return redirect(route('dangky'))->with('thongbao','Thêm Người Dùng Thành Công!');
        // } catch (\Exception $e) {
        //     //throw $th;
        //     var_dump($e.'abc');die;
        //     return redirect(route('dangky'))->with('thongbao','Thêm Người Dùng Thất Bại!');
        // }
        
    }
}
