<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use APP\District;
use APP\Producer;

class KhuVucController extends Controller
{
    //
    public function index(){
        $list_districtes = DB::table('districts')->get();
        // var_dump($list_district);die;
        // session()->put($list_district);
        return view('danhmuc.khuvuc.danhsach')->with('list_districtes', $list_districtes);
    }

    public function updatedistrict($id){
        $data = DB::table('districts')->where('id', $id)->first();
        return view('danhmuc.khuvuc.suakhuvuc')->with('data', $data);
    }

    public function postupdatedistrict(Request $request, $id){
        try {
            //code...
            DB::table('districts')->where('id', $id)->update([
                'dis_name' => $request->district_name,
            ]);
            return redirect()->back()->with('alert_success', 'Thay Đổi Tên Khu Vực Thành Công!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->back()->with('alert_error', 'Thay Đổi Tên Khu Vực Thất Bại!'.$e);
        }
    }

    public function deletedistrict($id){
        $data = DB::table('districts')->where('id', $id)->first();
        try {
            //code..
                    DB::table('districts')->where('id', $id)->delete();
           return redirect()->back()->with('alert_success', 'Xóa Khu Vực '.$data->dis_name.' Thành Công !' );
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('alert_error', 'Xóa Khu Vực '.$data->dis_name.' Thất Bại Do Khu Vực Này Còn Các Nhà Sản Xuất Khác. <br> Đề Nghị Bạn Xem Lại Các Nhà Sản Xuất Còn Trong Khu Vực!' );
        }

    }

    public function insertdistrict(){
        return view('danhmuc.khuvuc.themkhuvuc');
    }

    public function postinsertdistrict(Request $request){
        try {
            DB::table('districts')->insert([
                'dis_name' => $request->district_name,
            ]);
            return redirect()->back()->with('alert_success', 'Thêm Khu Vực Thành Công!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('alert_error', 'Thêm Khu Vực Thất Bại!');
        }
    }
}
