<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ThongBao extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates=['deleted_at'];
    // public function dsBinhLuan()
    // {
    // return $this->hasMany('App\Models\BinhLuan','id','thong_bao_id');
    // }
}
