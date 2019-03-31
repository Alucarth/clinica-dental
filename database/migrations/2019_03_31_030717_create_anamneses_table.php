<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnamnesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion')->nullable();
            $table->string('motivo_consulta')->nullable();
            $table->string('alergias')->nullable();
            $table->string('medicamentos')->nullable();
            $table->string('tratamientos_autorizados')->nullable();
            $table->string('medico_cabecera')->nullable();
            $table->integer('telefono_medico')->nullable();
            $table->boolean('sangrado_excesivo')->default(0)->nullable();
            $table->boolean('problema_cardiaco')->default(0)->nullable();
            $table->boolean('embarazo')->default(0)->nullable();
            $table->boolean('diabetes')->default(0)->nullable();
            $table->boolean('presion_baja')->default(0)->nullable();
            $table->boolean('presion_alta')->default(0)->nullable();
            $table->boolean('cancer')->default(0)->nullable();

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
        Schema::dropIfExists('anamneses');
    }
}
