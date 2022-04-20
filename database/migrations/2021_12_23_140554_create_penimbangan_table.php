<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenimbanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penimbangan', function (Blueprint $table) {
            $table->bigIncrements('id_timbang');
            $table->date('tgl_lahir');
            $table->string('hasil_timbang',150);
            $table->string('tinggi_badan',150);
            $table->string('status',150);
            $table->bigInteger('bayi_id')->unsigned()->nullable();
            $table->foreign('bayi_id')->references('id_bayi')->on('tb_bayi')->onDelete('cascade');
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
