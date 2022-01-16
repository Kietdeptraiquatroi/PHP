<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CapNhatController;
use  App\Http\Controllers\ThongBaoController;
use  App\Http\Controllers\GiaoVienController;
use  App\Http\Controllers\DangNhapController;
use  App\Http\Controllers\HocSinhController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\ForgotController;
use  App\Http\Controllers\BinhLuanController;



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
Route::get('/quen_mat_khau',[DangNhapController::class,'quenMatKhau'])->name('quen_mat_khau');

Route::get('/dang_xuat',[DangNhapController::class,'dangXuat'])->name('dang_xuat');

Route::get('/dang_ky',[AdminController::class,'dangKy'])->name('dang_ky');
Route::post('/dang_ky',[AdminController::class,'themMoi'])->name('xl_them_tk');

Route::get('/quen_mat_khau',[ForgotController::class,'forgot'])->name('forgot');
Route::post('/quen_mat_khau',[ForgotController::class,'xuLyForgot'])->name('xl_forgot');
Route::get('/reset_password',[ForgotController::class,'resetpass']);
Route::post('/update_password',[ForgotController::class,'updatePass'])->name('update_pass');

Route::middleware('auth')->group(function()
{

Route::get('/', function () {
    return view('welcome');
})->name('trang_chu');
//Cập nhật
Route::get('/cap_nhat_thong_tin{id}',[CapNhatController::class,'fromCapNhat'])->name('cn_tai_khoan');
Route::post('/cap_nhat_thong_tin{id}',[CapNhatController::class,'capNhat'])->name('xl_cn_tai_khoan');
Route::get('/back_main',[CapNhatController::class,'backMain'])->name('back_Main');

//Giáo viên
Route::get('/main_giao_vien',[GiaoVienController::class,'danhSachLop'])->name('giao_vien');
Route::post('/main_giao_vien',[GiaoVienController::class,'xuLyThemLop'])->name('them_moi_lop_hoc');
Route::get('/streamgv{id}',[GiaoVienController::class,'thongtinstreamLop'])->name('tt_stream_gv');
Route::get('/main_gv/{id}',[GiaoVienController::class,'deleteLop'])->name('xoa_lop');
Route::post('/main_gv_sua/{id}',[GiaoVienController::class,'suaLop'])->name('sua_lop');
Route::get('/people{id}',[GiaoVienController::class,'danhSachThanhVienLop'])->name('people');
Route::get('/peopledrestor/{id}',[GiaoVienController::class,'xacNhanHocVien'])->name('xac_nhan_vao_lop');
Route::get('/peopledkich/{id}',[GiaoVienController::class,'kichHocVien'])->name('kich_hoc_vien');

//Học viên
Route::get('/streamhv{id}',[HocSinhController::class,'thongtinstreamLop'])->name('tt_stream_hv');
Route::get('/main_hoc_vien',[HocSinhController::class,'xuLyHienLop'])->name('hoc_vien');
Route::post('/them_lop_sv',[HocSinhController::class,'xuLyVaoLop'])->name('them_ma_lop');
Route::get('/sinhvien/{id}',[HocSinhController::class,'roiLop'])->name('roi_lop');

//Admin

Route::get('/admin',[AdminController::class,'layDanhSachGV'])->name('ds_tai_khoan');
Route::get('/admin/{id}',[AdminController::class,'delete'])->name('xoa_tai_khoan');
Route::get('/admin/restore/{id}',[AdminController::class,'restore'])->name('khoi_phuc_tai_khoan');
Route::get('/admin/restoreLop/{id}',[AdminController::class,'restoreLop'])->name('khoi_phuc_lop');
Route::get('/admin/xoaLop/{id}',[AdminController::class,'xoaVinhVienLop'])->name('xoa_vinh_vien_lop');
Route::get('/admin/xoaTaiKhoan/{id}',[AdminController::class,'xoaVinhVienTaiKhoan'])->name('xoa_vinh_vien_tai_khoan');
Route::post('/admin/mail',[AdminController::class,'guiThongBao'])->name('gui_thong_bao');

//Thông báo
Route::post('/them_thong_bao/{id}',[ThongBaoController::class,'dangThongBao'])->name('them_thong_bao');
Route::get('/xoa_thong_bao/{id}',[ThongBaoController::class,'xoaThongBao'])->name('xoa_thong_bao');

//Bình luận
Route::get('/them_binh_luan/{id}',[BinhLuanController::class,'themBinhLuan'])->name('them_binh_luan');
Route::get('/xoa_binh_luan/{id}',[BinhLuanController::class,'xoaBinhLuan'])->name('xoa_binh_luan');

Route::get('/xoa_binh_luan/{id}',[BinhLuanController::class,'xoaBinhLuan'])->name('doc_du_lieu');







});
