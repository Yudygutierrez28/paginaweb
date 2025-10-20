<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken(); // 👈 necesario para login/logout
            $table->timestamps();
        });
    }

    /**
     * Reversa las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
