<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\User;
use App\Deparment;


class NhanVienController extends Controller
{
    //
    public function index(){

        $list_users = DB::table('users')->paginate(5);
        $todo = User::all();
        foreach($list_users as $list_user){
            switch ($list_user->dpm_id) {
                case '1':
                    $list_user->dpm_id = 'Admin';
                    break;
                case '2':
                    $list_user->dpm_id = 'Lãnh Đạo';
                    break;
                case '3':
                    $list_user->dpm_id = 'Quản Lí';
                    break;
                case '4':
                    $list_user->dpm_id = 'Nhân Viên';
                    break;
            }
        }

        return view('danhmuc.nhanvien.danhsach')->with(compact('list_users'));
    }

    public function viewuser(Request $request)
    {
        $query = $request->get('query');
        $data = User::where('id',$query)->first();
        return response()->json($data);
    }
}
