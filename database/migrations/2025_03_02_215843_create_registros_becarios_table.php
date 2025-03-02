<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosBecariosTable extends Migration
{
    public function up()
    {
        Schema::create('registros_becarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('fecha');
            $table->dateTime('hora_entrada');
            $table->dateTime('hora_salida')->nullable();
            $table->decimal('horas_dia', 5, 2)->default(0);
            $table->decimal('horas_acumuladas', 7, 2)->default(0);
            $table->decimal('objetivo_horas', 7, 2)->default(360.00);
            $table->string('semestre', 20);
            $table->text('comentarios')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'fecha']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros_becarios');
    }
}
