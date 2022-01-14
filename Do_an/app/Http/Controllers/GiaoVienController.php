<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\LopSinhVien;
use App\Models\ThongBao;
use App\Models\TaiKhoan;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;
class GiaoVienController extends Controller
{
//thêm lớp
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
            return redirect()->back();
            
            }


//danh sách lớp
     public function danhSachLop()
        {
            $user = Auth::user();
            $dsLop = Lop::where('tai_khoan_id',$user->id)->get();
             return view('gvmain',compact('dsLop'),compact('user'));
        }


//xóa lớp
      public function deleteLop($id)
        {
            $lop=Lop::find($id)->delete();
            return redirect()->back();
        }


// sửa thông tin lớp
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


//hiển thị danh sách sinh viên trong lớp
    public function danhSachThanhVienLop($id)
        {
            $user = Auth::user();
            $Lop = Lop::find($id);
        return view('people',compact('user'),compact('Lop'));
        }


//kích học sinh ra khỏi lớp
    public function kichHocVien($id)
        {
            $user = Auth::user();
            $lop_vs=LopSinhVien::withTrashed()->find($id);
            $lop_vs->forceDelete();
            return redirect()->back();
        }  
        
        
// hiển thị xác nhận học viên
    public function xacNhanHocVien($id)
        {
            $user = Auth::user();
            
            $lop_vs=LopSinhVien::withTrashed()->find($id);
            $lop_vs->restore();
            return redirect()->back();
        }  


// hiển thị thông tin lớp  
    public function thongtinstreamLop($id)
        {
            $user = Auth::user();
             $ttLop=Lop::find($id);
             $thongBao=ThongBao::where('lop_id',$id)->get();
           $binhLuan=BinhLuan::all();
           // dd($thongBao);
           return view('stream',compact('ttLop','user','thongBao','binhLuan'));
        }


// gửi from cho sinh viên vào lớp
    // public function guifromvaolop(Request $req,$id)
    //     {
    //             $taiKhoan=TaiKhoan::where('email',$req->email);
    //             $_count_mail=$taiKhoan->count();
    //             if($_count_mail==0)
    //             {
    //                 return redirect()->back()->with('thong_bao','Email chưa được đăng ký! Vui lòng nhập lại');
    //             }
    //            foreach($taiKhoan as $tk)
    //            {
    //                if($tk->loai_tk=='Giáo viên')
    //                {
    //                 return redirect()->back()->with('thong_bao','Email đăng ký với vai trò là giáo viên');
    //                }else
    //                {
                       
    //                    $checkLopC=LopSinhVien::where('sinh_vien_id',$tk->id);
    //                    $_count_id=$checkLop->count();
    //                    if(coute)
                      
    //                }
    //            }
    //         $mail=$req->email;
    //         $title_mail="Thông báo từ giáo viên";
    //         $noidung=$req->noi_dung;
    //         $data=array("body"=>$noidung,"email"=>$mail);
    //         Mail::send ('fromaddsv',['data'=>$data],function($message) use ($title_mail,$data){
    //             $message->to( $data['email'])->subject($title_mail);
    //             $message->from($data['email'],$title_mail);//send from this mail
    //         });
    //         return redirect()->back()->with('thong_bao','Gửi mail thành công :)');
    //     }

}
