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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre");
            $table->bigInteger("Dorsal");
            $table->string("Posicion");
            $table->text("Notas")->nullable();
            $table->bigInteger("Minutos");
            $table->bigInteger("Amarillas");
            $table->bigInteger("Rojas");
            $table->bigInteger("Goles");
            $table->bigInteger("Asistencias");
            $table->bigInteger("equipo_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
