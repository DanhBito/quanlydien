<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongTinCongTy;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\InforPost;

class ThongTinCongTyController extends Controller
{
    //
    public function index(){
        $infor_company = DB::table('informations')->first();
        return view('hethong.thongtincongty')->with('infor_company', $infor_company);
    }

    public function suathongtincty(){
        $infor_company = DB::table('informations')->first();
        return view('hethong.suathongtin')->with('infor_company', $infor_company);
    }

    public function updatethongtincty(InforPost $request){
        $validated = $request->validated(); 
        var_dump($request->inf_phone);die;
        try {
            //code...
            ThongTinCongTy::find(1)->update([
                'inf_name'    => $request->inf_name,
                'inf_address' => $request->inf_address,
                'inf_phone'   => $request->inf_phone,
                'inf_email'   => $request->inf_email,
                'inf_website' => $request->inf_website,
            ]);

            return redirect(route('thongtincongty'))->with('alert_success','Sửa Thông Tin Công Ty Thành Công!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect(route('thongtincongty'))->with('alert_error','Sửa Thông Tin Công Ty Thất bại!');
        }
        
    }
}
