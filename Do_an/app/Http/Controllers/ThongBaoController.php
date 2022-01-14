<?php

namespace App\Http\Controllers;
use App\Models\Lop;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ThongBaoRequest;


class ThongBaoController extends Controller
{
    public function dangThongBao(ThongBaoRequest $req ,$id)
    {
        $user=Auth::user();
        $thongBao=new ThongBao;
        $thongBao->id_nguoi_dang=$user->id;
        $thongBao->noi_dung=$req->thong_bao;
        $thongBao->lop_id=$id;
     
        if($req->file_upload==null){
           $thongBao->file=NULL;
        }else {
            if($req->has('file_upload'))
            {
                $file=$req->file_upload;
                $file_name=$file->getClientoriginalName();
                $file->move(public_path('upload'),$file_name);
                $req->merge(['file'=>$file_name]);
            }
            $file="upload/$req->file";
            $thongBao->file= $file;
            $thongBao->file="upload/$req->file";
        }
            //dd( $thongBao);
            $thongBao->save();
        return redirect()->back();

    }
    public function xoaThongBao($id)
    {
        $thongBaoXoa=ThongBao::find($id);
        //dd($thongBaoXoa);
        $thongBaoXoa->delete();
        return redirect()->back();
    }
    
}
