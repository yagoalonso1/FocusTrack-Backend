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
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id('id_paquete');
            $table->string('codigo_seguimiento')->unique();
            $table->enum('estado', [
                'pendiente', 
                'en_transito', 
                'en_reparto', 
                'entregado', 
                'devuelto', 
                'perdido'
            ])->default('pendiente');
            $table->timestamp('ultima_actualizacion')->nullable();
            $table->string('empresa_reparto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};
