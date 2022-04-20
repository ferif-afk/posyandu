<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IbuHamil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu_hamil', function (Blueprint $table) {
            $table->bigIncrements('id_bumil');
            $table->string('nik');
            $table->string('nama_bumil',150);
            $table->date('tgl_lahir');
            $table->string('gol_darah',10);
            $table->string('urutan_kehamilan');
            $table->string('pekerjaan',150);
            $table->string('alamat',150);
            $table->string('no_telp',50);
            $table->string('nama_suami',150);
            $table->bigInteger('bayi_id')->unsigned()->nullable();

            $table->timestamps();
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
        Schema::dropIfExists('ibu_hamil');
    }
}
