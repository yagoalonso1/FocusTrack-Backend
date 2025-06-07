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
        Schema::table('users', function (Blueprint $table) {
            // Renombrar la columna id a id_user
            $table->renameColumn('id', 'id_user');
            
            // Renombrar la columna name a nombre para ser más específico
            $table->renameColumn('name', 'nombre');
            
            // Agregar nuevos campos
            $table->string('apellido1')->after('nombre');
            $table->string('apellido2')->nullable()->after('apellido1');
            $table->enum('role', ['admin', 'user', 'moderator'])->default('user')->after('password');
            $table->text('token_web')->nullable()->after('role');
            $table->text('token_app')->nullable()->after('token_web');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revertir los cambios en orden inverso
            $table->dropColumn(['apellido1', 'apellido2', 'role', 'token_web', 'token_app']);
            $table->renameColumn('nombre', 'name');
            $table->renameColumn('id_user', 'id');
        });
    }
};
