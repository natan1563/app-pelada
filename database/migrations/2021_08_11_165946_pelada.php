<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pelada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelada', function (Blueprint $table) {
            $table->bigIncrements('idPelada');
            $table->string('nomeEvento');
            $table->date('data')->date_format('d-m-Y');
            $table->date('hora')->date_format('H:i:s');
            $table->string('local');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelada');
    }
}
