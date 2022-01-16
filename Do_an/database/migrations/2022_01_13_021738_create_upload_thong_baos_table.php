<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadThongBaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_thong_baos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_thong_bao');
            $table->foreign('id_thong_bao')->references('id')->on('thong_baos')->onDelete('cascade');
            $table->string('path')->NULL();
            $table->string('file')->NULL();
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
        Schema::dropIfExists('upload_thong_baos');
    }
}
