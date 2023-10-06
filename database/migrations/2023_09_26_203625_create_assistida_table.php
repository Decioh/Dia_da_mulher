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
        Schema::create('assistidas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tel');
            $table->string('email');
            $table->foreignId('cidades_id');
            $table->foreign('cidades_id')->references('id')->on('cidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistida');
    }
};
