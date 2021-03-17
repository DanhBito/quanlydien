<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct(){
        $this->DangNhap();
    }

    function DangNhap(){
        if(Auth::check()){
            $db = DB::table('users')->where('username',$username)->value('id');
            $nameuser = User::find($db)->nhanvien->toArray();
            view()->share('nameuser', $nameuser);
        }
    }
}
