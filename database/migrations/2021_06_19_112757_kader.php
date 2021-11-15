<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kader extends Migration
{
    public function up()
    {
        Schema::create('kader', function (Blueprint $table) {
            $table->bigIncrements('id_kader');
            $table->string('nama_kader',150);
            $table->string('jabatan',150);
            $table->string('jenis_kelamin',10);
            $table->date('tgl_lahir');
            $table->string('alamat',150);
            $table->string('no_telp',50);
            $table->timestamps();
        });
    }
    


/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::dropIfExists('kader');
}
}
