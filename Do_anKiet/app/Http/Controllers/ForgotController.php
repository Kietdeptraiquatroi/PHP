<?php

namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Mail;

class ForgotController extends Controller
{
    public function forgot()
    {
        return view('forgotpassword');
    }
    public function xuLyForgot(Request $request)
    {
        $checkUser =TaiKhoan::where('email',$request->mail)->first();
        if( !$checkUser)
        {
            return redirect()->back()->with("thong_bao","Vui lòng nhập đúng Email!");

        }else
        {
           return redirect()->route('resetpassword');
        }
       
    }
}
