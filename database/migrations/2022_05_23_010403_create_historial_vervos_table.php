<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialVervosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_vervos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_vervo');
            $table->bigInteger('id_historial')->unsigned();
            
            $table->timestamps();
            $table->foreign('id_historial')->references('id')->on('vervos')
            ->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_vervos');
    }
}
