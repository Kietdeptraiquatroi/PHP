<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\LopSinhVien;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;

class LopHocSinhController extends Controller
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
                 return redirect()->back()->with('thong_bao','Bạn đã tham gia lớp');
                }else{
                  return redirect()->back()->with('thong_bao','Lớp này bạn đã tham gia! vui lòng nhập lại');
              }
            }
            } else{
              $lop_sv=new LopSinhVien;
        $lop_sv->sinh_vien_id=$user->id;
        $lop_sv->lop_id=$lop_id;
        $lop_sv->save();
       return redirect()->back()->with('thong_bao','Bạn đã tham gia lớp'); 
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
       
}













       
  
       

