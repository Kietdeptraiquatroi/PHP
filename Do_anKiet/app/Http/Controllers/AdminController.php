<?php

namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    function layDanhSachGV()
    {
             $user=Auth::user();
             
            $dsTaiKhoanGV = TaiKhoan::where('loai_tk','Giáo viên' )->get();
            $dsTaiKhoanSV = TaiKhoan::where('loai_tk','Học viên' )->get(); 
            return view('admin',compact('dsTaiKhoanGV'),compact('dsTaiKhoanSV','user'));
           
    }
    function fromCapNhat($id)
    {
        
    $taiKhoan = TaiKhoan::find($id);
    //dd($taiKhoan);
    return view('updateaccount',compact('taiKhoan'));
    } 
    function capNhatTaiKhoan(Request $req)
    {
      //$taiKhoan=TaiKhoan::find($id);
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
   
    public function delete($id)
    {
      
      $idtaikhoan=taiKhoan::find($id)->delete();
        return redirect()->route('ds_tai_khoan');
    }

    
    
}
