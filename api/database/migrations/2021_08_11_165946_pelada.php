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
        Schema::create('peladas', function (Blueprint $table) {
            $table->bigIncrements('idPelada');
            $table->string('nomeEvento');
            $table->dateTime('data_hora')
                ->date_format('Y-m-d H:i')
                ->default(date('Y-m-d H:i'));
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
