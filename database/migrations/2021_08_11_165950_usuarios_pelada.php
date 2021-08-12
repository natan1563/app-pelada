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
            $table->tinyInteger('idUsuario');
            $table->tinyInteger('idPelada');
            $table->enum('convidado', ['s', 'n'])
                ->default('n');
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
