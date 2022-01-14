<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BinhLuan extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    // public function chiTietTaiKhoan()
    //     {
    //         return $this->belongsTo('App\Models\TaiKhoan','tai_khoan_id','id');
    //     }
}
