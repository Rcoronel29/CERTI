<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->string('nregistro')->nullable();
            $table->unsignedBigInteger('idCurso')->nullable(); // Permitir valores nulos
            $table->foreign('idCurso')->references('id')->on('cursos');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->string('aux')->nullable();
            $table->string('archivo')->nullable();
            $table->string('color')->nullable();
            $table->string('enlace')->nullable();
            $table->boolean('estado');
            $table->date('fecha');
            $table->string('nombreCurso')->nullable();
            $table->string('nivel')->nullable();
    
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
        Schema::dropIfExists('certificados');
    }
};
