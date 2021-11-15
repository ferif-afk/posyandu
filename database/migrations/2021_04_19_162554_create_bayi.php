<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bayi', function (Blueprint $table) {
            $table->bigIncrements('id_bayi');
            $table->string('nama_bayi',150);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin',50);
            $table->string('berat_lahir',150);
            $table->string('panjang_lahir',150);
            $table->string('anak_ke',10);
            $table->bigInteger('timbang_id')->unsigned()->nullable();

            $table->timestamps();
            $table->foreign('timbang_id')->references('id_timbang')->on('penimbangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_bayi');
    }
}
