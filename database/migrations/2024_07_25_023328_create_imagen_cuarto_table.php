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
        Schema::create('imagen_cuarto', function (Blueprint $table) {
            $table->unsignedBigInteger('id_imagen');
            $table->unsignedBigInteger('id_cuarto');
            $table->foreign('id_imagen')->references('id')->on('imagen');
            $table->foreign('id_cuarto')->references('id')->on('cuarto');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagen_cuarto');
    }
};
