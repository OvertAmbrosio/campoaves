<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaEtiquetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_etiqueta', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('entrada_id')->unsigned();
            $table->integer('etiqueta_id')->unsigned();

            $table->timestamps();

            //relaciones

            $table->foreign('entrada_id')->references('id')->on('entradas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrada_etiqueta');
    }
}
