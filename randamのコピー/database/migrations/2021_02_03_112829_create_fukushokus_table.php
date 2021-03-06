<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFukushokusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fukushokus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('bunrui');
            $table->integer('kakaku');
            $table->integer('genka');
            $table->string('name');
            $table->boolean('display');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
        Schema::dropIfExists('fukushokus');
    }
}
