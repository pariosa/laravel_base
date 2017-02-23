<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gender');
            $table->string('name');
            $table->string('nickname');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->integer('owner');
            $table->string('job');
            $table->string('disabilities'); 
            $table->timestamps();});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
