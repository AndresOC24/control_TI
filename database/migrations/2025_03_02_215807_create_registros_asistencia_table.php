<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosAsistenciaTable extends Migration
{
    public function up()
    {
        Schema::create('registros_asistencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('fecha');
            $table->dateTime('hora_entrada')->nullable();
            $table->dateTime('hora_salida')->nullable();
            $table->integer('minutos_tarde_entrada')->default(0);
            $table->integer('minutos_temprano_salida')->default(0);
            $table->integer('balance_minutos_dia')->default(0);
            $table->integer('balance_minutos_acumulado')->default(0);
            $table->text('comentarios')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'fecha']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros_asistencia');
    }
}
