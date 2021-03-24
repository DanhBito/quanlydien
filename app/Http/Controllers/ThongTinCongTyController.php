<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongTinCongTy;
use Illuminate\Support\Facades\DB;

class ThongTinCongTyController extends Controller
{
    //
    public function index(){
        $infor_company = ThongTinCongTy::find(1)->toArray();
        session()->put($infor_company);
        return view('hethong.thongtincongty')->with('infor_company', $infor_company);
    }

    public function suathongtincty(){
        return view('hethong.suathongtin');
    }

    public function updatethongtincty(Request $request){
        $this->validate($request,[
            'cty_sdt' => 'digits:10|starts_with:0',
            'cty_email' => 'required_with:gmail.com',
        ],[
            'cty_sdt.digits'=> 'Nhập Số Điện Thoại Đủ 10 Số',
            'cty_sdt.starts_with' => 'Số Điện Thoại Phải Bắt Đầu Từ Số 0',
            'cty_email.required_with' => 'Không Đúng Mẫu Eamil',
        ]);
        
        try {
            //code...
            ThongTinCongTy::find(1)->update([
                'cty_ten'=> $request->cty_ten,
                'cty_diachi'=> $request->cty_diachi,
                'cty_sdt'=> $request->cty_sdt,
                'cty_email'=> $request->cty_email,
                'cty_website'=> $request->cty_website,
            ]);

            return redirect(route('thongtincongty'))->with('thongbao','Sửa Thông Tin Công Ty Thành Công!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect(route('thongtincongty'))->with('thongbao','Sửa Thông Tin Công Ty Thất bại!');
        }
        
    }
}
