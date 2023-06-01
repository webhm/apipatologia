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
        Schema::create('informe_muestra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('informe_id');
            $table->foreign('informe_id')->references('id')->on('informes')->onDelete('cascade');
            $table->unsignedBigInteger('muestra_id');
            $table->foreign('muestra_id')->references('id')->on('muestras')->onDelete('cascade');
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
        Schema::dropIfExists('informe_muestra');
    }
};
