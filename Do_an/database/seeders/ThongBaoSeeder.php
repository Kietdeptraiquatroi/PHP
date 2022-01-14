<?php

namespace Database\Seeders;
 use App\Models\ThongBao;
use Illuminate\Database\Seeder;

class ThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lsv=new ThongBao();
        $lsv->id_nguoi_dang=1;
        $lsv->noi_dung="nội dung nè";
        $lsv->lop_id=1;
        $lsv->file=NULL;
        $lsv->save();
    }
}
