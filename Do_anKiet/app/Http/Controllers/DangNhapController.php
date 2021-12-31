<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;
class DangNhapController extends Controller
{

    //hiển thị đang nhập
    public function dangNhap()
    {
        return view('login');
    }
    //xữ lý đăng nhập
    public function xuLyDangNhap(DangNhapRequest $request)
    {
        if (Auth::attempt(['username' => $request->ten_dang_nhap, 'password' =>$request->mat_khau])) {
            $user = Auth::user();
            $value = $request->session()->put('username', $request->ten_dang_nhap );
            if($user->loai_tk=="admin")
            {
               //return $value = $request->session()->get('username');
                return redirect()->route('ds_tai_khoan');
            }
            if($user->loai_tk=="Giáo viên")
            {
                 return redirect()->route('giao_vien');
            }
            if($user->loai_tk=="Học viên")
            {
                 return redirect()->route('hoc_vien');
            }
           
        }
        else{
            return redirect()->back()->with("thong_bao","Đăng nhập thất bại! Vui lòng nhập lại");
        }
       
    }
    public function dangXuat()
    {
       Auth::logout();
       return redirect()->route('dang_nhap');
    }
}
