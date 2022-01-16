<?php

namespace App\Http\Controllers;
use App\Models\Lop;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use App\Models\UploadThongBao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ThongBaoRequest;
use File;
use Storage;


class ThongBaoController extends Controller
{
    public function dangThongBao(ThongBaoRequest $req ,$id)
    {
        $user=Auth::user();
        $thongBao=new ThongBao;
        $thongBao->id_nguoi_dang=$user->id;
        $thongBao->noi_dung=$req->thong_bao;
        $thongBao->lop_id=$id;
     //dd($req->file_upload);
        if($req->file_upload==null){
           $thongBao->file=NULL;
        }else {
            if($req->has('file_upload'))
            {
                $files_upload=$req->file_upload;
                foreach($files_upload as $file)
                {
                    $file_name=$file->getClientoriginalName();
                    //dd( $file_name);
                    $file->move(public_path('upload'),$file_name);
                    $req->merge(['file'=>$file_name]);
                    $file="upload/$req->file";
                    $thongBao->save();
                    $file_data=File::get( $file);
                    $files=Storage::disk('google')->put($file_name,$file_data);
                    $upload_thong_bao=new UploadThongBao;
                    $upload_thong_bao->file= $file;
                    $upload_thong_bao->file="upload/$req->file";
                    $googleDrive=Storage::disk('google');
                    $contents=collect($googleDrive->listContents('/',false))->where('name',$file_name)->first();
                    $upload_thong_bao->path=$contents['path'];
                    $upload_thong_bao->id_thong_bao=$thongBao->id;
                    $upload_thong_bao->save();
                }
               
            }
           
     
          
         // dd($contents);
        }
           
           
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
