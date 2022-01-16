<?php

namespace App\Http\Controllers;
use App\Models\Lop;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class BinhLuanController extends Controller
{
    public function themBinhLuan(Request $req,$id)
    {
        $user=Auth::user();
        $binhLuan= new BinhLuan;
        $binhLuan->noi_dung_binh_luan=$req->noi_dung_binh_luan;
        $binhLuan->tai_khoan_binh_luan_id=$user->id;
        $binhLuan->thong_bao_id=$id;
        // dd( $binhLuan);
        $binhLuan->save();
        return redirect()->back();
    }
    public function xoaBinhLuan( $id)
    {
        $binhLuan=BinhLuan::find($id);
        $binhLuan->delete();
        return redirect()->back();
    }
}
