<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostoTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costo_tratamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('material');
            $table->integer('precion');
            $table->unsignedBigInteger('tratamiento_id');
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');
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
        Schema::dropIfExists('costo_tratamientos');
    }
}
