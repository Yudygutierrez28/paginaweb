<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('mascotas', function (Blueprint $table) {
        $table->string('imagen')->nullable(); // Ruta o URL de la imagen
    });
}

public function down()
{
    Schema::table('mascotas', function (Blueprint $table) {
        $table->dropColumn('imagen');
    });
}
};
