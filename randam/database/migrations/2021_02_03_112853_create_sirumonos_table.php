<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSirumonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sirumonos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('bunrui')->nullable()->change();
            $table->integer('kakaku')->nullable()->change();
            $table->integer('genka')->nullable()->change();
            $table->string('name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->integer('bunrui')->nullable(false)->change();
        $table->integer('kakaku')->nullable(false)->change();
        $table->integer('genka')->nullable(false)->change();
        $table->string('name')->nullable(false)->change();
        Schema::dropIfExists('sirumonos');
    }
}
