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
        Schema::create('muestras', function (Blueprint $table) {
            $table->id();
            $table->integer('nopedidomv');
            $table->integer('nohistoriaclinicamv');
            $table->integer('noatencionmv');
            $table->longText('descripcion');
            $table->longText('observacionesmuestranovalida')->nullable();
            $table->boolean('valida');
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
        Schema::dropIfExists('muestras');
    }
};
