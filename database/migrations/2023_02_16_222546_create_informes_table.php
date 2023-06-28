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
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->integer('nopedidomv');
            $table->integer('nohistoriaclinicamv');
            $table->integer('noatencionmv');
            $table->string('medicosolicitante', 150);
            $table->string('nombrepaciente', 150);
            $table->string('cedulaidentidad', 150);
            $table->string('servicio', 200);
            $table->string('plan', 200);
            $table->string('instruccion', 200);
            $table->string('ubicacion', 200);
            $table->string('edad', 30);
            $table->date('fechapedido');
            $table->integer('secuencial');
            $table->integer('year');
            $table->unsignedBigInteger('idtipoinforme');
            $table->foreign('idtipoinforme')->references('id')->on('tipoinformes');
            $table->unsignedBigInteger('idestadopedido');
            $table->foreign('idestadopedido')->references('id')->on('estadopedidos');
            $table->string('codigoinforme', 30);
            $table->longText('informacionclinica');
            $table->longText('diagnostico');
            $table->longText('macroscopico');
            $table->longText('resultmicroscopico');
            $table->longText('dgpresuntivo');
            $table->date('fechadocumento');
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
        Schema::dropIfExists('informes');
    }
};
