<?php

namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use App\Models\Lop;
use App\Models\LopSinhVien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangKyRequest;
use Mail;
class AdminController extends Controller
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
     return redirect()->route('dang_nhap')->with('thong_bao','Đăng ký thành công');
     }

    function layDanhSachGV()
    {
             $user=Auth::user();
             
            $dsTaiKhoanGV = TaiKhoan::where('loai_tk','Giáo viên' )->get();
            $dsTaiKhoanSV = TaiKhoan::where('loai_tk','Học viên' )->get(); 
            $dsLop=Lop::all();
            $lopSV=LopSinhVien::all();
            $dsGVXoa=TaiKhoan::where('loai_tk','Giáo viên')->onlyTrashed()->get();
            $dsHVXoa=TaiKhoan::where('loai_tk','Học viên')->onlyTrashed()->get();
            $dsLopXoa=Lop::onlyTrashed()->get();
           // dd($dsLopXoa);
          //($dsGVXoa->chiTietTaiKhoan);
            return view('admin',compact('dsTaiKhoanGV','dsLop','dsTaiKhoanSV','user'),compact('dsGVXoa','dsHVXoa','dsLopXoa'));
           
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
  public function guiThongBao(Request $req){
      $taiKhoan=TaiKhoan::where('email',$req->email);
      $_count_mail=$taiKhoan->count();
      if($_count_mail==0)
      {
          return redirect()->back()->with('thong_bao','Email chưa được đăng ký! Vui lòng nhập lại');
      }
    $mail=$req->email;
    $title_mail="Thông báo từ quản trị viên lớp học";
    $noidung=$req->noi_dung;
    $data=array("body"=>$noidung,"email"=>$mail);
    Mail::send ('adsendmail',['data'=>$data],function($message) use ($title_mail,$data){
        $message->to( $data['email'])->subject($title_mail);
        $message->from($data['email'],$title_mail);//send from this mail
    });
    return redirect()->back()->with('thong_bao','Gửi mail thành công :)');
  }
    public function delete($id)
    {
      
      $idtaikhoan=taiKhoan::find($id);
      if($idtaikhoan->loai_tk=="Giáo viên")
      {
        $danhSachLop=Lop::where('tai_khoan_id',$idtaikhoan->id);
        $danhSachLop->delete();
      }
      $idtaikhoan->delete();
        return redirect()->route('ds_tai_khoan');
    }
    public function restore($id)
    {  
      $idtaikhoan=taiKhoan::withTrashed()->find($id);
      if($idtaikhoan->loai_tk=="Giáo viên")
      {
        $danhSachLop=Lop::where('tai_khoan_id',$idtaikhoan->id);
        $danhSachLop->restore();
      }
      $idtaikhoan->restore();
        return redirect()->route('ds_tai_khoan');
    }
    public function restoreLop($id)
      {
        $lop=Lop::withTrashed()->find($id);
        $lop->restore();
          return redirect()->back();
      }
      public function xoaVinhVienLop($id)
      {
        $lop=Lop::withTrashed()->find($id);
        $lop->forceDelete();
          return redirect()->back();
      }
      public function xoaVinhVienTaiKhoan($id)
      {
        $idtaikhoan=taiKhoan::withTrashed()->find($id);
        if($idtaikhoan->loai_tk=="Giáo viên")
      {
        $danhSachLop=Lop::where('tai_khoan_id',$idtaikhoan->id);
        $danhSachLop->forceDelete();
      }
        $taikhoan->forceDelete();
          return redirect()->back();
      }
}
