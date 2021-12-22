<?php

namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use App\Models\Lop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function layDanhSachGV()
    {
            $dsTaiKhoanGV = TaiKhoan::where('loai_tk','Giáo viên' )->get();
            $dsTaiKhoanSV = TaiKhoan::where('loai_tk','Học viên' )->get(); 
            return view('admin',compact('dsTaiKhoanGV'),compact('dsTaiKhoanSV'));
           
    }
    public function delete($id)
    {
      
      $idtaikhoan=taiKhoan::find($id)->delete();
        return redirect()->route('ds_tai_khoan');
    }
    public function thongTinHV($id)
    {
      
      $taikhoanHV=taiKhoan::find($id);
        return view('admin')->compact("taikhoanHV");
    }
    
    
}
