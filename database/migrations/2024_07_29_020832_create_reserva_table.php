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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_reserva');
            $table->string('descripcion')->nullable();
            $table->string('forma_pago');
            $table->string('estado')->nullable();
            $table->float('monto')->nullable();
            $table->unsignedBigInteger('id_inquilino')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_inquilino')->references('id')->on('inquilino');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
