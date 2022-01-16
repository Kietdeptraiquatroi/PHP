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
        $lop->code='242sfds24';
        $lop->background="https://cdn.dribbble.com/users/1338391/screenshots/15333283/media/8b76dd5f6d7d18d37e4e3b74b33cd903.jpg?compress=1&resize=1600x1200";
        $lop->tai_khoan_id=6;
        $lop->save();
    }
}
