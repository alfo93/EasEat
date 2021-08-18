<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Locals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('indirizzo');
            $table->integer('num_tavoli');
            $table->unsignedBigInteger('id_ristoratore');
            $table->integer('disp_massima');
            $table->integer('menu');
            $table->binary('pianta')->nullable();
            $table->string('tipo');
            $table->tinyInteger('sponsorizzato');
            $table->string('link_immagine');
            $table->string('info');
            $table->timestamps();

            $table->foreign('id_ristoratore')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locals');
    }
}
