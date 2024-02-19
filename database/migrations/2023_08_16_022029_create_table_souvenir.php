<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSouvenir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souvenir', function (Blueprint $table) {
            $table->id();
            $table->string('namaBarang');
            $table->string('kodeGL');
            $table->string('kodeBarang')->nullable();
            $table->integer('saldo');
            $table->string('satuanBarang');
            $table->integer('hargaSatuan');
            $table->string('status');
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
        Schema::dropIfExists('souvenir');
    }
}
