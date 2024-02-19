<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRekamPendaftaranSouvenir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekamPendaftaranSouvenir', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('namaUser');
            $table->string('namaBarang');
            $table->string('kodeBarang');
            $table->integer('debet');
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
        Schema::dropIfExists('rekamPendaftaranSouvenir');
    }
}
