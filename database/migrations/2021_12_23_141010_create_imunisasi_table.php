<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImunisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imunisasi', function (Blueprint $table) {
            $table->bigIncrements('id_imunisasi');
            $table->date('tgl_imunisasi');
            $table->string('umur_skr',50);
            $table->string('ket',150);
            $table->bigInteger('jenis_id')->unsigned()->nullable();
            $table->bigInteger('bayi_id')->unsigned()->nullable();

            $table->timestamps();
            $table->foreign('jenis_id')->references('id_jenis')->on('jenis_imunisasi')->onDelete('cascade');
            $table->foreign('bayi_id')->references('id_bayi')->on('tb_bayi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imunisasi');
    }
}
