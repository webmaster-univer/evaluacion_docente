<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionContestadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_contestadas', function (Blueprint $table) {
            $table->id();
            $table->integer('alumno_id');
            $table->string('grupo');
            $table->string('docente');
            $table->integer('plantel_id');
            $table->integer('pregunta1');
            $table->integer('pregunta2');
            $table->integer('pregunta3');
            $table->integer('pregunta4');
            $table->integer('pregunta5');
            $table->integer('pregunta6');
            $table->integer('total');
            $table->text('observaciones');
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
        Schema::dropIfExists('evaluacion_contestadas');
    }
}
