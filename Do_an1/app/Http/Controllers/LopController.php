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
       $cod= random_int(100000,999999);
        $lop=new Lop;
        $lop->ten_lop=$req->ten_lop;
        $lop->thong_tin=$req->thong_tin;
        $lop->code=$cod;
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
          return redirect()->route('giao_vien');
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

    //    public function danhSachThanhVienLop($id)
    //    {
    //       $user = Auth::user();
    //       $Lop = Lop::find($id);
    //   return view('people',compact('user'),compact('Lop'));
    public function danhSachThanhVienLop()
    {
       $user = Auth::user();
      
   return view('people',compact('user'));
        }

        public function thongtinstreamLop($id)
        {
           $user = Auth::user();
           $dsLop = Lop::find($id);
        return view('stream',compact('dsLop','user'));
        }
       
       

}
