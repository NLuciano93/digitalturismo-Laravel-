<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->bigIncrements('id_comentario')->nullable(false);
            $table->foreing('id_usuario')->references('id')->on('users');
            $table->foreing('id_destino')->references('id_destino')->on('destino');
            $table->text('comentario')->default(NULL);
            $table->tinyInteger(`puntuacion`)->default(NULL);
            $table->timestamps()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
