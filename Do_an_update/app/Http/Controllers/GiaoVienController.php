<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\LopSinhVien;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
class GiaoVienController extends Controller
{
    public function xuLyThemLop(Request $req)
    {
        $validatedData = $req->validate([
            'ten_lop' => 'required',
            'thong_tin' => 'required',
        ]);
        $dslop=Lop::where('code',$req->code)->get();
        $conter_code=$dslop->count();
        $user = Auth::user();
       $cod=Str::random(10);
        $lop=new Lop;
        $lop->ten_lop=$req->ten_lop;
        $lop->thong_tin=$req->thong_tin;
        if($conter_code==0)
        {
            $lop->code=$cod;
        }else{
            $cod=Str::random(10);
            $lop->code=$cod;
        }
       
        $lop->tai_khoan_id=$user->id;
        if($req->file_upload==null){
            $lop->background="svgs/8.jpg";
        }else {
            if($req->has('file_upload'))
            {
                $file=$req->file_upload;
                $file_name=$file->getClientoriginalName();
                $file->move(public_path('br'),$file_name);
                $req->merge(['background'=>$file_name]);
            }
            $background="br/$req->background";
            $lop->background= $background;
            $lop->background="br/$req->background";
        }
       
        

        // dd($lop);
        $lop->save();
    //  redirect()->route('ds_tai_khoan');
    return redirect()->back();
    
     }
     public function danhSachLop()
     {
        $user = Auth::user();
        $dsLop = Lop::where('tai_khoan_id',$user->id)->get();
    return view('gvmain',compact('dsLop'),compact('user'));
      }

      public function deleteLop($id)
      {
        $lop=Lop::find($id)->delete();
          return redirect()->back();
      }
      public function suaLop(Request $req, $id)
      {
        $user = Auth::user();
        $lop=Lop::find($id);
        $lop->ten_lop=$req->ten_lop;
        $lop->thong_tin=$req->thong_tin;
        if($req->file_upload==null){
            $lop->background="svgs/8.jpg";
        }else {
            if($req->has('file_upload'))
            {
                $file=$req->file_upload;
                $file_name=$file->getClientoriginalName();
                $file->move(public_path('br'),$file_name);
                $req->merge(['background'=>$file_name]);
            }
            $background="br/$req->background";
            $lop->background= $background;
            $lop->background="br/$req->background";
        }
        
       // dd($lop);
        $lop->save();
        return redirect()->route('back_Main');
         
      }


      public function danhSachLopHV(Request $request)
      {
         $user = Auth::user();
         $dsLop = Lop::where('tai_khoan_id',$user->id)->get();
     return view('hsmain',compact('dsLop'),compact('user'));
       }

       public function danhSachThanhVienLop($id)
       {
          $user = Auth::user();
          $Lop = Lop::find($id);
      return view('people',compact('user'),compact('Lop'));
       }
    public function xacNhanHocVien($id)
    {
       $user = Auth::user();
      
    $lop_vs=LopSinhVien::withTrashed()->find($id);
    $lop_vs->restore();
      return redirect()->back();
    }    
        public function thongtinstreamLop($id)
        {
            $user = Auth::user();
          $ttLop=Lop::find($id);
    
          //dd($ttLop);
           return view('stream',compact('ttLop','user'));
        }
       
       

}
