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
        Schema::create('cortes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('informe_id');
            $table->foreign('informe_id')->references('id')->on('informes')->onDelete('cascade');
            $table->string('codigocorte', 30);
            $table->string('letra', 2);
            $table->integer('consecutivo');
            $table->longText('descripcion');
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
        Schema::dropIfExists('cortes');
    }
};
