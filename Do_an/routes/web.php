<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\DangKyController;
use  App\Http\Controllers\LopController;
use  App\Http\Controllers\DangNhapController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\ForgotController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dang_nhap',[DangNhapController::class,'dangNhap'])->name('dang_nhap')->middleware('guest');
Route::post('/dang_nhap',[DangNhapController::class,'xuLyDangNhap'])->name('xl_dang_nhap');

Route::get('/dang_xuat',[DangNhapController::class,'dangXuat'])->name('dang_xuat');

Route::get('/dang_ky',[DangKyController::class,'dangKy'])->name('dang_ky');
Route::post('/dang_ky',[DangKyController::class,'themMoi'])->name('xl_them_tk');

Route::get('/quen_mat_khau',[ForgotController::class,'forgot'])->name('forgot');
Route::post('/quen_mat_khau',[ForgotController::class,'xuLyForgot'])->name('xl_forgot');

Route::get('/mail', function () {return view('mailreset');})->name('mail_reset');  
Route::get('/mail_reset', function () {return view('resetpassword');})->name('resetpassword');  


Route::middleware('auth')->group(function()
{
Route::get('/thong_tin_tai_khoan',[DangKyController::class,'layDanhSach'])->name('ds_tai_khoan_cn');
Route::get('/cap_nhat_thong_tin',[DangKyController::class,'fromCapNhat'])->name('cn_tai_khoan');
Route::post('/cap_nhat_thong_tin',[DangKyController::class,'capNhat'])->name('xl_cn_tai_khoan');
Route::get('/back_main',[DangKyController::class,'backMain'])->name('back_Main');
Route::get('/main_giao_vien',[LopController::class,'danhSachLop'])->name('giao_vien');
Route::get('/infor',[LopController::class,'thongTinHV'])->name('ad_thong_tin_hv');




    Route::get('/', function () {
        return view('layouts/main');
    })->name('trang_chu');
    Route::get('/admin',[AdminController::class,'layDanhSachGV'])->name('ds_tai_khoan');
    Route::post('/admin/{id}',[AdminController::class,'delete'])->name('xoa_tai_khoan');
    Route::post('/main_giao_vien',[LopController::class,'xuLyThemLop'])->name('them_moi_lop_hoc');
   


    Route::get('/mai', function () {
        return view('hsmain');
    })->name('trang_chu_hv');
    Route::get('/stream', function () {
        return view('stream');
    })->name('stream');
});
