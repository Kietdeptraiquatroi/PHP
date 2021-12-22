<?php

namespace Database\Seeders;
use App\Models\Lop;
use App\Models\Taikhoan;
use Illuminate\Database\Seeder;

class LopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lop=new Lop();
        $lop->ten_lop='Anh văn căn bản A1';
        $lop->thong_tin=' Khóa Học Anh Văn A3 Căn Bản Cho Người Mất Gốc';
        $lop->code='242424';
        $lop->background="1.img";
        $lop->tai_khoan_id="3";
        $lop->save();
    }
}
