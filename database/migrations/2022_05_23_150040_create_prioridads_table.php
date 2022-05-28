<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioridadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prioridads', function (Blueprint $table) {
            $table->increments('id');
        $table->integer('id_user');
        $table->bigInteger('id_vervo')->unsigned();
        
        
        $table->foreign('id_vervo')->references('id')->on('vervos')
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
        Schema::dropIfExists('prioridads');
    }
}
