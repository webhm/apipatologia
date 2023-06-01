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
        Schema::create('auditoriapedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('nopedido');
            $table->integer('nohistoriaclinica');
            $table->integer('noatencion');
            $table->string('accion');
            $table->string('ip');
            $table->date('fechaaccion');
            $table->time('timeaccion');
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
        Schema::dropIfExists('auditoriapedidos');
    }
};
