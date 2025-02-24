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
        Schema::create('recibo_alquiler', function (Blueprint $table) {
            $table->id();
            $table->float('a_cuenta');
            $table->float('debe')->nullable();
            $table->string('descripcion');
            $table->date('fecha_alquiler');
            $table->date('fecha_pago');
            $table->string('metodo_pago');
            $table->float('monto_total');
            $table->string('estado');
            $table->string('recibi_de');
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->foreign('id_contrato')->references('id')->on('contrato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recibo_alquiler');
    }
};
