<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nationality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalities', function(Blueprint $table){
            $table->id();
            $table->string('name');
        });

        Schema::table('movies', function(Blueprint $table){
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')->references('id')->on('nationalities');
        });

        Schema::table('actors', function(Blueprint $table){
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')->references('id')->on('nationalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nationalities');

        Schema::table('movies', function(Blueprint $table){
            $table->dropColumn('nationality_id');
        });

        Schema::table('actors', function(Blueprint $table){
            $table->dropColumn('nationality_id');
        });
    }
}
