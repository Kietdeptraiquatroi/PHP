<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lop extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates=['deleted_at'];
    public function chiTietTaiKhoan()
        {
            return $this->belongsToMany('App\Models\TaiKhoan','lop_sinh_viens','lop_id','sinh_vien_id')->withPivot('deleted_at','id');
        }
        public function chiTietTaiKhoanGiaoVien()
        {
            return $this->belongsTo('App\Models\TaiKhoan','tai_khoan_id','id');
        }
}

