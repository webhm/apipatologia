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
        Schema::create('plantillamacroscopicas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreplantilla');
            $table->string('nombreusuario')->nullable();
            $table->string('descripcion')->nullable();
            $table->longText('infoclinica')->nullable();
            $table->longText('dgpresuntivo')->nullable();
            $table->longText('resultmacroscopico')->nullable();
            $table->longText('resultmicroscopico')->nullable();
            $table->longText('diagnostico')->nullable();
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
        Schema::dropIfExists('plantillamacroscopicas');
    }
};
