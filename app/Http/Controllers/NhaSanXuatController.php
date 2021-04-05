<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Producer;
use App\District;

class NhaSanXuatController extends Controller
{
    //
    public function index(){
        $datas = DB::table('producers')->paginate(5);
        // $abc = District::find(1);
        // var_dump($abc->dis_name);die;
        
        // $district = District::find(DB::table('producers')->select('id'))
        foreach ($datas as $data) {
            # code...
            $dis = District::find($data->dis_id);
            $data->dis_id = $dis->dis_name;
        }

        $districts = District::all();
        return view('danhmuc.nhasanxuat.danhsach')->with(compact('datas'))->with(compact('districts'));
    }

    public function getedit($id){
        $data = Producer::where('id',$id)->first();
        return response()->json($data);
    }

    public function postupdatproducer(Request $request){
        try {
        //     //code...
                    DB::table('producers')->where('id', $request->id)->update($request->all());
            $data = DB::table('producers')->select('id')->where('id',$request->id)->first();
            return response()->json($data);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json($e);
        }
        // return response()->json($data);
    }

    public function deleteproducer($id){
        $data = DB::table('producers')->select('pro_name')->where('id', $id)->first();
                DB::table('producers')->where('id', $id)->delete();
        return response()->json($data);
    }
}
