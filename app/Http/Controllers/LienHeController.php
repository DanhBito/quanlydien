<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class LienHeController extends Controller
{
    public function index()
    {
        return view('trogiup.lienhe.lienhe');
    }

    public function store(Request $request)
    {
        $datas = [
            'name' => $request->fullname,
            // 'phone' => $request->phone,
            'email' => $request->email,
            'msg' => $request->message,
        ];
           
        // var_dump($data);die;

        Mail::send('trogiup.lienhe.sendEmail',$datas ,function($mail) use($request){
            $mail->from('abc2012199@gmail.com', $request->name);
            $mail->to('abc2012199@gmail.com', 'Support')->subject('Notification email');
        });
        // Mail::to('0974619741danh@gmail.com')->send(new MailNotify($data));

        return back()->with('success', 'Yêu cầu của bạn đã được gửi!');
    }
}
