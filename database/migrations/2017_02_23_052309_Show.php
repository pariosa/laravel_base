<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Show extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('show', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner');
            $table->string('name');
            $table->string('venue');
            $table->string('opener');
            $table->string('opener2');
            $table->string('opener3');
            $table->string('opener4');
            $table->string('headliner');
            $table->string('cover');
            $table->string('rider');
            $table->string('event_starts');
            $table->string('event_ends');
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
        Schema::drop('note');
    }
}
