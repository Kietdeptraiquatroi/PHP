<?php

namespace Database\Seeders;
use App\Models\LopSinhVien;

use Illuminate\Database\Seeder;

class LopSinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lsv=new LopSinhVien();
        $lsv->sinh_vien_id=5;
        $lsv->lop_id=21;
        $lsv->save();
    }
}
