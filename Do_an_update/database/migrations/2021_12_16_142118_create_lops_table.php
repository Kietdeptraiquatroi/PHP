<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lops', function (Blueprint $table) {
            $table->id();
            $table->string('ten_lop');
            $table->string('thong_tin');
            $table->string('code')->unique();
            $table->unsignedBigInteger('tai_khoan_id');
           $table->foreign('tai_khoan_id')->references('id')->on('tai_khoans')->onDelete('cascade');;
            $table->string('background');
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
        Schema::dropIfExists('lops');
    }
}
