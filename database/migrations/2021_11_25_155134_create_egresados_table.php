<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresados', function (Blueprint $table) {
            
            $table->id();

            $table->string('Usuario');
            $table->enum('Status', ['Activo','Inactivo'])->default('Inactivo');
            $table->string('AñoGrado');
            $table->string('Nombre');
            $table->string('Afinidad');
            $table->string('Descripcion');
            $table->string('Foto');

            

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
        Schema::dropIfExists('egresados');
    }
}
