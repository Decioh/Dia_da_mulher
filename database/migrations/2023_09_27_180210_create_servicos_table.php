<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assistida_id');
            $table->foreign('assistida_id')->references('id')->on('assistidas');
            $table->integer('lanche')->default('0') ; 
            $table->integer('lanches_QTD')->nullable();
            $table->boolean('acompanhada')->default('0');
            $table->boolean('defensoria')->default('0');
            $table->boolean('cras')->default('0');
            $table->boolean('codhab')->default('0');
            $table->boolean('senac')->default('0');
            $table->boolean('sesc_consulta')->default('0');
            $table->boolean('sesc_sens')->default('0');
            $table->boolean('sesc_mamografia')->default('0');
            $table->boolean('sesc_odonto')->default('0');
            $table->boolean('sesc_insercao_diu')->default('0');
            $table->boolean('sesc_citopatologico')->default('0');
            $table->boolean('sesc_enfermagem')->default('0');
            $table->boolean('sedet')->default('0');
            $table->boolean('secretaria_da_mulher')->default('0');
            $table->boolean('sec_saude')->default('0');
            $table->boolean('sejus_subav')->default('0');
            $table->boolean('delegacia_da_mulher')->default('0');
            $table->boolean('fiocruz')->default('0');
            $table->boolean('demanda_n_atendida')->default('0');
            $table->char('qual?')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
