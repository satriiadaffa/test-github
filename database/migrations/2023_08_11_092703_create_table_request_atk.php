<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRequestAtk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestAtk', function (Blueprint $table) {
            $table->id();
            $table->string('namaUnit');
            $table->string('namaBarang');
            $table->string('kodeBarang');
            $table->string('debet');
            $table->string('nip');
            $table->string('namaUser');
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
        Schema::dropIfExists('requestAtk');
    }
}
