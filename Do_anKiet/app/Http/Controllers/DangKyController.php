<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangKyRequest;
class DangKyController extends Controller
{
    public function dangKy()
    {
        return view('register');
    }


    function themMoi(DangKyRequest $req){
        $taiKhoan=new TaiKhoan;
        $taiKhoan->username=$req->username;
        $taiKhoan->password=Hash::make($req->password);
        $taiKhoan->ho_ten=$req->ho_ten;
        $taiKhoan->email=$req->email;
        $taiKhoan->phone=$req->phone;
        $taiKhoan->loai_tk=$req->loai_tk;
        $taiKhoan->images="svgs/admin.jpg";
        $taiKhoan->save();
     return redirect()->route('dang_nhap');
     }


    
    function fromCapNhat(Request $request)
    {
    $value = $request->session()->get('username');
    $taiKhoan = TaiKhoan::where('username',$value )->get();
    return view('updateaccount',compact('taiKhoan'));
    } 
    function backMain(Request $request)
    {
        $user = Auth::user();
        if($user->loai_tk=="Giáo viên")
        {
            return redirect()->route('giao_vien');
        }elseif($user->loai_tk=="Học viên")
        {
            return redirect()->route('hoc_vien');
        }
         # code...
        }   
    
    
    
    function capNhat(Request $req){
        $user = Auth::user();

        $value = $req->session()->get('username');
        $taiKhoan = TaiKhoan::where('username',$value )->get()->first();
        $taiKhoan->ho_ten=$req->ho_ten;
        $taiKhoan->email=$req->email;
        $taiKhoan->phone=$req->phone;
       if($req->password_cu!=NULL)
       {
            if ( Hash::check($req->password_cu,$user->password) )
            {
                $taiKhoan->password=Hash::make($req->password_moi);
            }
            else
            {
                return redirect()->back()->with("thong_bao","Mật khẩu củ không đúng!");

            }
        }
        if($req->has('file_upload'))
        {
            $file=$req->file_upload;
            $file_name=$file->getClientoriginalName();
            $file->move(public_path('svgs'),$file_name);
            $req->merge(['images'=>$file_name]);
        }
        $image="svgs/$req->images";
        $taiKhoan->images= $image;
        // dd($taiKhoan->images);
        $taiKhoan->save();
        return redirect()->route('back_Main');
    }
}
