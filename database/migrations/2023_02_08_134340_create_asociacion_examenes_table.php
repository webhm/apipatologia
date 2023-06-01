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
        Schema::create('asociacion_examenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idmuestra');
            $table->foreign('idmuestra')->references('id')->on('muestras')->onDelete('cascade');
            $table->integer('codigoexamenmv');
            $table->integer('nopedidomv');
            $table->string('descripcion');
            $table->string('observaciones')->nullable();
            $table->string('status');
            $table->boolean('tieneinforme');
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
        Schema::dropIfExists('asociacion_examenes');
    }
};
