<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Hash;
class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qtv=new TaiKhoan();
        $qtv->username='admin';
        $qtv->password=Hash::make('123456');
        $qtv->ho_ten='Administrator';
        $qtv->email='admin@example.com';
        $qtv->phone='0708743966';
        $qtv->loai_tk='admin';
        $qtv->images='svgs/admin.jpg';
        $qtv->token=null;
        $qtv->save();
    }
}
