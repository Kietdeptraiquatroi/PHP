<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
class LopController extends Controller
{
    public function xuLyThemLop(Request $req)
    {
        $user = Auth::user();
       $cod= random_int(10);
        $lop=new Lop;
        $lop->ten_lop=$req->ten_lop;
        $lop->thong_tin=$req->thong_tin;
        $lop->code=$cod;
        $lop->tai_khoan_id=$user->id;
        $lop->background=$req->background;
        dd($lop);
        $taiKhoan->save();
    //  redirect()->route('ds_tai_khoan');
    return redirect()->back();
    
     }
     public function danhSachLop(Request $request)
     {
        $user = Auth::user();
        $dsLop = Lop::all();
    return view('gvmain',compact('dsLop'),compact('user'));
      }
}
