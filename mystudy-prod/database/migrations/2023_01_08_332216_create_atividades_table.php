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
        Schema::create('atividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plano_id')->references('id')->on('plano_estudos');
            $table->foreignId('assunto_id')->references('id')->on('assuntos');
            $table->string('atividade_tags');
            $table->date('atividade_data');
            $table->date('atividade_tempo');
            $table->String('atividade_status', 20);
            $table->String('atividade_prioridade', 20);
            $table->String('atividade_observacao', 200);
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
        Schema::dropIfExists('atividades');
    }
};
