<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('longitud');
            $table->string('latitud');
            $table->unsignedBigInteger('direccionEnvio_id');
            $table->timestamps();
            $table->foreign('direccionEnvio_id')->references('id')->on('direccionEnvios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locacions');
    }
}
