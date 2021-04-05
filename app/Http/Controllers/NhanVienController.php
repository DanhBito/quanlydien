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
        foreach($list_users as $list_user){
            $dpm = Deparment::find($list_user->dpm_id);
            $list_user->dpm_id = $dpm->dpm_name;
        }

        return view('danhmuc.nhanvien.danhsach')->with(compact('list_users'));
    }

    public function viewuser($id)
    {
        $data = User::where('id',$id)->first();

        return response()->json($data);

    }

    public function getupdateuser($id){
        $data = User::where('id',$id)->first();
        return response()->json($data);
    }

    public function postupdateuser(Request $request){
        try {
        //     //code...
                    DB::table('users')->where('id', $request->id)->update($request->all());
            $data = DB::table('users')->select('id')->where('id',$request->id)->first();
            return response()->json($data);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json($e);
        }
        // return response()->json($data);
    }

    public function deleteuser($id){
        $data = DB::table('users')->select('fullname')->where('id',$id)->first();
                DB::table('users')->where('id', $id)->delete();
        return response()->json($data);
    }

    public function searchuser(Request $request){

    }
}
