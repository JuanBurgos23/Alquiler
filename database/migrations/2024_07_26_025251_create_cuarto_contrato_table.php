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
        Schema::create('cuarto_contrato', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cuarto');
            $table->unsignedBigInteger('id_contrato');
            $table->foreign('id_cuarto')->references('id')->on('cuarto');
            $table->foreign('id_contrato')->references('id')->on('contrato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuarto_contrato');
    }
};
