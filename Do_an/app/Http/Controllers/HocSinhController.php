<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\LopSinhVien;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use App\Models\BinhLuan;


use Illuminate\Support\Facades\Auth;

class HocSinhController extends Controller
{
    public function xuLyVaoLop(Request $req)
    {
       $user=Auth::user();
      $lop=Lop::where('code',$req->code)->get();
      if ($lop) {
        $count_lop=$lop->count();
        if($count_lop==0)
        {
          return redirect()->back()->with('thong_bao','Lớp không tồn tại! vui lòng nhập lại');
        }else{
          foreach($lop as $lp)
          {
            $lop_id=$lp->id;
            //dd($lop_id);
            $lop_sv=LopSinhVien::where('lop_id',$lop_id)->get();
            $count_lop_sv=$lop_sv->count();
           // dd($count_lop_sv);
            if($count_lop_sv>0)
            {
              foreach($lop_sv as $lop)
              {
                $lop_sv_id=LopSinhVien::where('sinh_vien_id',$user->id)->get();
                $count_lop_id=$lop_sv_id->count();
                if($count_lop_id==0)
                {
                  $lop_sv=new LopSinhVien;
                  $lop_sv->sinh_vien_id=$user->id;
                  $lop_sv->lop_id=$lop_id;
                  $lop_sv->save();
                  $lop_sv->delete();
                 return redirect()->back()->with('thong_bao','Đang chờ xác nhận từ giảng viên');
                }else{
                  return redirect()->back()->with('thong_bao','Lớp này bạn đã tham gia! vui lòng nhập lại');
              }
            }
            } else{
              $lop_sv=new LopSinhVien;
        $lop_sv->sinh_vien_id=$user->id;
        $lop_sv->lop_id=$lop_id;
        $lop_sv->save();
        $lop_sv->delete();
       return redirect()->back()->with('thong_bao','Đang chờ xác nhận từ giảng viên'); 
          }
        }
        # code...
      }
    }

      

    }
      public function xuLyHienLop()
    {
        $user = Auth::user();
      $taikhoan=TaiKhoan::find($user->id);
      
      // $taikhoanGv=TaiKhoan::where('id',)
     $taikhoanGV=TaiKhoan::where('loai_tk','Giáo viên')->get();
     
      
       return view('hsmain',compact('taikhoan','user','taikhoanGV'));


    }
    public function roiLop($id)
    {
     
    $lop_vs=LopSinhVien::find($id);
   // dd($lop_vs);
    $lop_vs->forceDelete();
      return redirect()->back();
    }   
    
    public function thongtinstreamLop($id)
    {
        $user = Auth::user();
         $ttLop=Lop::find($id);
         $thongBao=ThongBao::where('lop_id',$id)->get();
         $binhLuan=BinhLuan::all();
       // dd($thongBao);
       return view('streamhv',compact('ttLop','user','thongBao','binhLuan'));
    }

       
}













       
  
       

