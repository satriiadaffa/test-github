<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRekamTambahSaldoAtk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekamTambahSaldoAtk', function (Blueprint $table) {
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
        Schema::dropIfExists('rekamTambahSaldoAtk');
    }
}
