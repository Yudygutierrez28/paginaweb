<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('adoptantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('cedula')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adoptantes');
    }
};
