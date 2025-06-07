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
        Schema::create('paquete_lista', function (Blueprint $table) {
            $table->id();
            
            // Claves foráneas
            $table->unsignedBigInteger('id_paquete');
            $table->unsignedBigInteger('id_lista');
            
            // Definir las claves foráneas con cascadas
            $table->foreign('id_paquete')
                  ->references('id_paquete')
                  ->on('paquetes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            $table->foreign('id_lista')
                  ->references('id_lista')
                  ->on('listas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            
            // Índice único para evitar duplicados
            $table->unique(['id_paquete', 'id_lista']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquete_lista');
    }
};
