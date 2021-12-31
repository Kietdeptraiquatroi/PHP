<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
            $data=$request->all();
            $taikhoan=TaiKhoan::where('email',$request->mail)->get();
            foreach($taikhoan as $key=>$value)
            {
                $taikhoan_id=$value->id;

            }
            $token_random=Str::random(20);
            $taiKhoan=TaiKhoan::find($taikhoan_id);
            $taiKhoan->token=$token_random;
           
            $taiKhoan->save();
            // dd($taiKhoan);
            $title_mail="lấy lại mật khẩu";
            $to_email = $data['mail'];
           
            $link_reset_pass=url('/reset_password?email='.$to_email.'&token='.$token_random);

            //dd($link_reset_pass);//send to this email
           
            $taiKhoan=
            $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['mail']); //body of mail.blade.php
            
            Mail::send('fogot',['data'=>$data],function($message) use ($title_mail,$data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);//send from this mail
            });
            return redirect()->back()->with("thong_bao","Mail đã được gửi vui lòng vào mail để lấy đặt lại mật khẩu!");
        }

    }
    public function resetpass()
    {
        return view('resetpassword');
    }
    public function updatePass(Request $request)
    {
        $data=$request->all();
        //dd($data['email']);
        $token_random=Str::random(20);
        $taiKhoan=TaiKhoan::Where('email',$data['email'])->where('token',$data['token'])->get();
        //dd($taiKhoan);
        $count=$taiKhoan->count();
        if($count>0){
            foreach($taiKhoan as $tk)
            {
                $taiKhoan_id=$tk->id;
            }
            $taikhoan=TaiKhoan::find($taiKhoan_id);
            $taikhoan->password=Hash::make($request->password);
           $taikhoan->token=$request->$token_random;
           $taikhoan->save();
           return redirect()->route('dang_nhap')->with('thong_bao','Mật khẩu đã được đặt lại');
        }else{
            return redirect()->back()->with('thong_bao','Link đã quá hạn!');
        }
       
    }
}
