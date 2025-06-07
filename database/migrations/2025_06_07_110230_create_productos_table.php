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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->string('color')->nullable();
            $table->string('talla')->nullable();
            $table->string('marca')->nullable();
            $table->integer('cantidad_comprada')->default(0);
            $table->integer('cantidad_disponible')->default(0);
            $table->string('tipo')->nullable();
            $table->decimal('precio_pagado', 10, 2)->nullable();
            $table->decimal('precio_comprado', 10, 2)->nullable();
            $table->decimal('precio_pagado_original', 10, 2)->nullable();
            $table->decimal('precio_pagado_final', 10, 2)->nullable();
            $table->decimal('precio_venta', 10, 2)->nullable();
            $table->string('plataforma')->nullable();
            $table->decimal('precio_envio', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
