<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Urldata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('urldata', function (Blueprint $table){
        $table->bigIncrements('id');
        $table->string('actual_url');
        $table->string('tiny_url');
        $table->integer('user_id');
        $table->integer('analytics');
        $table->integer('user_role');
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
        //
    }
}
