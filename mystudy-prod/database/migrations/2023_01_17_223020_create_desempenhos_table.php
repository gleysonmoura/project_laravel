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
        Schema::create('desempenhos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exer_id')->references('id')->on('exercicios')->onDelete('cascade');
            $table->integer('desempenho_quantidade');
            $table->integer('desempenho_certas');
            $table->integer('desempenho_erradas');
            $table->float('desempenho_porcentagem');
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
        Schema::dropIfExists('desempenhos');
    }
};
