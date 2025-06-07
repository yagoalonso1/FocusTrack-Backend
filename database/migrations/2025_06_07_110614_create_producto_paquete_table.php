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
        Schema::create('producto_paquete', function (Blueprint $table) {
            $table->id();
            
            // Claves foráneas
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_paquete');
            
            // Campo cantidad
            $table->integer('cantidad')->default(1);
            
            // Definir las claves foráneas con cascadas
            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('productos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            $table->foreign('id_paquete')
                  ->references('id_paquete')
                  ->on('paquetes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            
            // Índice único para evitar duplicados
            $table->unique(['id_producto', 'id_paquete']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_paquete');
    }
};
