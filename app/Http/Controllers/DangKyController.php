<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ChucVu;
use App\NhanVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\RegistrationPost;

class DangKyController extends Controller
{
    //
    // public function stripVN($str) {
    //     $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    //     $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    //     $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    //     $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    //     $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    //     $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    //     $str = preg_replace("/(đ)/", 'd', $str);
    
    //     $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    //     $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    //     $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    //     $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    //     $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    //     $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    //     $str = preg_replace("/(Đ)/", 'D', $str);

    //     // $str = preg_replace('/[^A-Za-z0-9\-]/','', $str);

    //     // $str = strtolower($str).rand(0,99999);
    //     return $str;
    // }
    
    // public function setCookie(Request $request){

    //     // $response->withCookie('fullname_cookie', $fullname, $min);
    //     // $response->withCookie('gender_cookie', $gender, $min);
    //     // $response->withCookie('birth_cookie', $birth, $min);
    //     // $response->withCookie('address_cookie', $address, $min);
    //     // $response->withCookie('cmnd_cookie', $cmnd, $min);
    //     // $response->withCookie('phone_number_cookie', $phone_number, $min);
    //     // $response->withCookie('email_cookie', $email, $min);
    //     // $response->withCookie('date_joining_cookie', $date_joining, $min);
    //     // $response->withCookie('position_cookie', $position, $min);

    //     $response = new Response;
    //     // $response->withCookie('response',$request,2);
    //     $fullname = $request->fullname;
    //     $gender = $request->gender;
    //     $birth = $request->birth;
    //     $address = $request->address;
    //     $cmnd = $request->cmnd;
    //     $phone_number = $request->phone_number;
    //     $email = $request->email;
    //     $date_joining = $request->date_joining;
    //     $position = $request->positon;
    //     $min = 1;

    //     // session()->put($position);
    //     // session()->put($gender);

        

    //     $fullname_cookie = cookie('fullname', $fullname, $min);
    //     $gender_cookie = cookie('gender', $gender, $min);
    //     $birth_cookie = cookie('birth', $birth, $min);
    //     $address_cookie = cookie('address', $address, $min);
    //     $cmnd_cookie = cookie('cmnd', $cmnd, $min);
    //     $phone_number_cookie = cookie('phone_number', $phone_number, $min);
    //     $email_cookie = cookie('email', $email, $min);
    //     $date_joining_cookie = cookie('date_joining', $date_joining, $min);
    //     $position_cookie = cookie('position', $position, $min);

    //     Cookie::queue($fullname_cookie );
    //     Cookie::queue($gender_cookie );
    //     Cookie::queue($birth_cookie );
    //     Cookie::queue($address_cookie );
    //     Cookie::queue($cmnd_cookie );
    //     Cookie::queue($phone_number_cookie );
    //     Cookie::queue($email_cookie );
    //     Cookie::queue($date_joining_cookie );
    //     Cookie::queue($position_cookie);
    //     // return redirect(route('dangky'));
    // }


    public function index(){
        // $this->setCookie($request);
        return view('hethong.taotaikhoan');
    }

    public function checkDangKy(RegistrationPost $request)
    {
        $validated = $request->validated();

        $fullname = $request->old('fullname');
        $gender = $request->old('gender');
        $birth = $request->old('birth');
        $address = $request->old('address');
        $cmnd = $request->old('cmnd');
        $phone_number = $request->old('phone_number');
        $email = $request->old('email');
        $position = $request->old('position');
        $username = $request->old('username');
        # code...
        // $response = new Response;
        // // $response->withCookie('response',$request,2);
        // $fullname = $request->fullname;
        // $gender = $request->gender;
        // $birth = $request->birth;
        // $address = $request->address;
        // $cmnd = $request->cmnd;
        // $phone_number = $request->phone_number;
        // $email = $request->email;
        // $date_joining = $request->date_joining;
        // $position = $request->positon;
        // $min = 100000000000;

        // $fullname_cookie = cookie('fullname', $fullname, $min);
        // $gender_cookie = cookie('gender', $gender, $min);
        // $birth_cookie = cookie('birth', $birth, $min);
        // $address_cookie = cookie('address', $address, $min);
        // $cmnd_cookie = cookie('cmnd', $cmnd, $min);
        // $phone_number_cookie = cookie('phone_number', $phone_number, $min);
        // $email_cookie = cookie('email', $email, $min);
        // $date_joining_cookie = cookie('date_joining', $date_joining, $min);
        // $position_cookie = cookie('position', $position, $min);

        // Cookie::queue($fullname_cookie );
        // Cookie::queue($gender_cookie );
        // Cookie::queue($birth_cookie );
        // Cookie::queue($address_cookie );
        // Cookie::queue($cmnd_cookie );
        // Cookie::queue($phone_number_cookie );
        // Cookie::queue($email_cookie );
        // Cookie::queue($date_joining_cookie );
        // Cookie::queue($position_cookie);
        // var_dump(Cookie::get('fullname_cookie'));die;

        // $this->setCookie($request);

        // $this->validate($request,[
        //     'cmnd'              => 'digits:10',
        //     'birth'             => 'before:2015-01-01',
        //     'phone_number' => 'digits:10|starts_with:0',
        //     'email' => 'required_with:gmail.com',
        //     'date_joining' => 'before:today',
        //     'password'=>'min:6|max:32',
        //     'password_confirm'=>'same:password',
        //     ],[
        //     'cmnd.digits' => 'Bạn Nhập Số Chứng Minh Nhân Dân Phải Đủ 10 Số !' ,
        //     'email' => 'Không Đúng Mẫu Email',
        //     'birth.before' => 'Ngày Sinh Phải Trước Ngày 01-01-2015',
        //     'phone_number.digits' => 'Bạn Nhập Số Điện Thoại Phải Đủ 10 Số !',
        //     'phone_number.starts_with'=> 'Số Điện Thoại Phải Bắt Đầu Bằng Số 0',
        //     'date_joining.before' => 'Ngày Vào Làm Phải Trước Ngày Hôm Nay !',
        //     'password.min' => 'Mật Khẩu Mới Phải Trên 6 Ký Tự !',
        //     'password.max' => 'Mật Khẩu Mới Không Quá 32 Ký Tự !',   
        //     'password_confirm.same' => 'Nhập Lại Mật Khẩu Không Trùng Khớp'
        //     ]);
//switch case
        switch ($request->position) {
            case 'admin':
                # code...
                $dpm_id = 1;
                break;
            
            case 'lanhdao':
                # code...
                $dpm_id = 2;
                break;

            case 'quanli':
                # code...
                $dpm_id = 3;
                break;

            default:
                # code...
                $dpm_id = 4;
                break;
        }  

        // if ($request->position === 'admin') {
        //     # code...
        //     $dpm_id = 1;
        // }elseif ($request->position === 'lanhdao') {
        //     # code...
        //     $dpm_id = 2;
        // }elseif ($request->position === 'quanli') {
        //     # code...
        //     $dpm_id = 3;
        // }elseif ($request->position === 'nhanvien') {
        //     # code...
        //     $dpm_id = 4;
        // }

        // $fullname =$this->stripVN($request->fullname) ;
        // $nv_id = DB::table('nhanvien')->where('nv_ma','nv1')->value('id');
        // var_dump($nv_id);die;
        // $nv_id = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $request->fullname)).rand(00,99999);
// var_dump($request->email);die;
        // var_dump($fullname);die;
        // var_dump(rand(00,99999));die;

        try {
            //code...
            $user = User::create([
                'username'       => $request->username,
                'password'       => bcrypt($request->password),
                'fullname'       => $request->fullname,
                'gender'         => $request->gender,
                'birth'          => $request->birth,
                'address'        => $request->address,
                'identification' => $request->cmnd,
                'phone'          => $request->phone_number,
                'email'          => $request->email,
                'joining'        => $request->date_joining,
                'dpm_id'         => $dpm_id,
            ]);

            return redirect(route('dangky'))->with('alert_success','Thêm Người Dùng Thành Công!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect(route('dangky'))->with('alert_error','Thêm Người Dùng Thất Bại! '. $e);
        }
    }
}
