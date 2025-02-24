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
        Schema::create('cuarto_reserva', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cuarto');
            $table->unsignedBigInteger('id_reserva');
            $table->foreign('id_cuarto')->references('id')->on('cuarto');
            $table->foreign('id_reserva')->references('id')->on('reserva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuarto_reserva');
    }
};
