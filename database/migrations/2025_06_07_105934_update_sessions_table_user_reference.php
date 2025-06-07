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
        Schema::table('sessions', function (Blueprint $table) {
            // Simplemente renombrar la columna user_id a id_user
            $table->renameColumn('user_id', 'id_user');
            
            // Agregar la nueva restricción de clave foránea con cascada
            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            // Eliminar la nueva restricción de clave foránea
            $table->dropForeign(['id_user']);
            
            // Renombrar la columna de vuelta a user_id
            $table->renameColumn('id_user', 'user_id');
            
            // Restaurar la restricción original (sin cascada)
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
    }
};
