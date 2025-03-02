<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosEspecialesTable extends Migration
{
    public function up()
    {
        Schema::create('horarios_especiales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('fecha');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->text('motivo')->nullable();
            $table->unsignedBigInteger('creado_por');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('creado_por')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'fecha']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios_especiales');
    }
}
