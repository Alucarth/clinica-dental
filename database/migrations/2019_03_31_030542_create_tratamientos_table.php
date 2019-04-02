<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('balance',8,2)->nullable(); //estado actual de lo cancelado 
            $table->decimal('costo_tratamiento',8,2)->nullable(); //estado actual de lo cancelado 
            //odontopediatria
            $table->enum('anestesia',['primera','segunda','tercera']);
            $table->boolean('colaborador')->default(false);
            //cirugias
            $table->enum('exodoncia',['cirugia de terceros','caninos retenidos','apisectomia','otros']);
            $table->string('descripcion_cirugia')->nullable();
            //ortodoncia
            $table->date('fecha_ortodoncia');
            $table->string('higiene_dental');
            $table->string('descripcion_ortodoncia')->nullable();
            //implantes
            $table->string('diagnostico');
            $table->string('planificacion');
            $table->date('fecha_cirugia');
            $table->time('hora');
            //rehabilitacion
            $table->boolean('impresiones_preliminares')->default(false);
            $table->boolean('impresiones_trabajo')->default(false);
            $table->boolean('prueba_metal')->default(false);
            //endodoncia
            $table->enum('radiografia',['uniradiculares','biradiculares','multiradiculares'])->nullable();
            $table->string('descripcion_endodoncia')->nullable();
            
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('odontologo_id');
            $table->foreign('odontologo_id')->references('id')->on('odontologos');
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
        Schema::dropIfExists('tratamientos');
    }
}
