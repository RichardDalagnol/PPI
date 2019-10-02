<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avisos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tituloAviso');
            $table->text('conteudoAviso');
            $table->date('data');
            $table->integer('idUsuario')->unsigned();
            $table->integer('idSetor')->unsigned();

            $table->foreign('idUsuario')->references('id')->on('usuarios');
            $table->foreign('idSetor')->references('id')->on('setors');

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
        Schema::dropIfExists('avisos');
    }
}
