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
        Schema::create('cuarto', function (Blueprint $table) {
            $table->id();
            $table->float('precio');
            $table->string('estado');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('id_dimension')->nullable();
            $table->foreign('id_dimension')->references('id')->on('dimension');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuarto');
    }
};