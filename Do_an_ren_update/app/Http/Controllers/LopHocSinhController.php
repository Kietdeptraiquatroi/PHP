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
    // public function xuLyVaoLop(Request $req)
    // {
    //    $user=Auth::user();
    //  return $this->belongsToMany('App\Models\LopSinhVien');
       
      

    // }
      public function xuLyHienLop()
    {
        $user = Auth::user();
       
       

       return view('hsmain',compact('user'));
    }
       
}













       
  
       

