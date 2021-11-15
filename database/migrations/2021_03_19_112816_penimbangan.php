<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penimbangan extends Migration
{
    public function up()
    {
        Schema::create('penimbangan', function (Blueprint $table) {
            $table->bigIncrements('id_timbang');
            $table->date('tgl_lahir');
            $table->string('hasil_timbang',150);
            $table->string('tinggi_badan',150);
            $table->string('status',150);
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
    Schema::dropIfExists('penimbangan');
}
}
