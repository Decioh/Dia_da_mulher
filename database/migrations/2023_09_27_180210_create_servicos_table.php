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
            $table->integer('lanche')->default(0) ; 
            $table->integer('lanches_QTD');
            $table->boolean('acompanhada');
            $table->boolean('defensoria');
            $table->boolean('cras');
            $table->boolean('codhab');
            $table->boolean('senac');
            $table->boolean('sesc_consulta');
            $table->boolean('sesc_sens');
            $table->boolean('sesc_mamografia');
            $table->boolean('sesc_odonto');
            $table->boolean('sesc_insercao_diu');
            $table->boolean('sesc_citopatologico');
            $table->boolean('sesc_enfermagem');
            $table->boolean('sedet');
            $table->boolean('secretaria_da_mulher');
            $table->boolean('sec_saude');
            $table->boolean('sejus_subav');
            $table->boolean('delegacia_da_mulher');
            $table->boolean('fiocruz');
            $table->boolean('demanda_n_atendida');
            $table->char('qual?');
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
