<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            $table->string('noi_dung_binh_luan');
            $table->unsignedBigInteger('tai_khoan_binh_luan_id');
            $table->unsignedBigInteger('thong_bao_id');
            $table->foreign('tai_khoan_binh_luan_id')->references('id')->on('tai_khoans')->onDelete('cascade');;
            $table->foreign('thong_bao_id')->references('id')->on('thong_baos')->onDelete('cascade');;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binh_luans');
    }
}
