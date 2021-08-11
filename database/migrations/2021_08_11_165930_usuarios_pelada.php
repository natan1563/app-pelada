<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuariosPelada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_pelada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idUsuario');
            $table->bigInteger('idPelada');

            $table->foreign('idUsuario')
                    ->references('usuarios')
                    ->on('id');

            $table->foreign('idPelada')
                    ->references('pelada')
                    ->on('idPelada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_pelada');
    }
}
