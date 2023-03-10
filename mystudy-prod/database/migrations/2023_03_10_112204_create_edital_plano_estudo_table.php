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
        Schema::create('edital_plano_estudo', function (Blueprint $table) {
            $table->unsignedBigInteger('edital_id');
            $table->unsignedBigInteger('plano_estudo_id');
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->timestamps();

            $table->foreign('edital_id')->references('id')->on('editals')->onDelete('cascade');
            $table->foreign('plano_estudo_id')->references('id')->on('plano_estudos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edital_plano_estudo');
    }
};
