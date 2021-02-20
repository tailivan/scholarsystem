<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compets', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('heure');
            $table->unsignedBigInteger('team1_id');
            $table->foreign('team1_id')->references('id')->on('teams');
            $table->unsignedBigInteger('team2_id');
            $table->foreign('team2_id')->references('id')->on('teams');
            $table->integer('score_1')->nullable();
            $table->integer('score_2')->nullable();
                
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
        Schema::dropIfExists('compets');
    }
}
