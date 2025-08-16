<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apadrinacions', function (Blueprint $table) {
            $table->id();
        $table->string('nombre');
        $table->string('cedula');
        $table->string('telefono');
        $table->string('direccion');
        $table->foreignId('mascota_id')->constrained('mascotas');
        $table->decimal('monto', 8, 2);
        $table->string('tiempo_consignacion'); // Mensual, Trimestral, etc.
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apadrinacions');
    }
};
