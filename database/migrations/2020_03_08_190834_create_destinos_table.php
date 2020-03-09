<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinos', function (Blueprint $table) {
            $table->bigIncrements('id_destino')->nullable(False);
            $table->string('nombre_destino', 100)->nullable(False);
            $table->string('detalle',50);
            $table->text('descripcion');
            $table->decimal('precio', 10, 2)->nullable(False);
            $table->tinyInteger('promocion')->nullable(False);
            $table->string('avatar_destino')->nullable(False);
            $table->foreign('id_provincia')->references('id')->on('provincia');
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
        Schema::dropIfExists('destinos');
    }
}
