<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anotacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plano_id')->references('id')->on('plano_estudos');
            $table->foreignId('assunto_id')->references('id')->on('assuntos');
            $table->string('titulo_anotacao', 200);
            $table->longText('texto_anotacao');
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
        Schema::dropIfExists('anotacoes');
    }
};
