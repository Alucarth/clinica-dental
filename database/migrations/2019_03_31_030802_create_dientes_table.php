<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nro_pieza');
            $table->string('vestibular');
            $table->string('distal');
            $table->string('oclusal');
            $table->string('palatino');
            $table->string('mesial');
            $table->date('fecha')->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('dientes');
    }
}
