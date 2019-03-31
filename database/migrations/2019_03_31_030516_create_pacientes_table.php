<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->integer('telefono')->nullable();
            $table->integer('celular')->nullable();
            $table->string('email')->nullable();
            $table->integer('edad')->nullable();
            $table->string('sexo')->nullable();
            $table->string('pais')->nullable();
            $table->string('informacion_adicional')->nullable();
            $table->string('antecedente_enfermedad')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_address')->nullable();
            $table->integer('father_phone')->nullable();


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
        Schema::dropIfExists('pacientes');
    }
}
