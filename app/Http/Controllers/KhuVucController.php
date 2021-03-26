<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use APP\District;
use APP\Producer;

class KhuVucController extends Controller
{
    //
    public function index(){
        $list_district = DB::table('districts')->get()->toArray();
        // var_dump($list_district);die;
        session()->put($list_district);
        return view('danhmuc.khuvuc.danhsach')->with('list_district',$list_district);
    }
}
