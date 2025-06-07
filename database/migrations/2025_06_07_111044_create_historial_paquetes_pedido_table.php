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
        Schema::create('historial_paquetes_pedido', function (Blueprint $table) {
            $table->id('id_historial');
            
            $table->unsignedBigInteger('id_paquete');
            
            $table->enum('estado', [
                'pendiente', 
                'en_transito', 
                'en_reparto', 
                'entregado', 
                'devuelto', 
                'perdido'
            ]);
            
            $table->timestamp('fecha');
            
            $table->foreign('id_paquete')
                  ->references('id_paquete')
                  ->on('paquetes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            
            $table->index('id_paquete');
            $table->index('fecha');
            $table->index(['id_paquete', 'fecha']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_paquetes_pedido');
    }
};
