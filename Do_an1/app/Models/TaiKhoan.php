<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoan extends Authenticatable
{
    use HasFactory;
    public function chiTiet(){
        return $this->belongsToMany('App\Models\Lop','lop_sinh_viens','sinh_vien_id','lop_id');
    }
}
