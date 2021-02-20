<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compet_id');
            $table->foreign('compet_id')->references('id')->on('compets');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players');
            $table->unsignedBigInteger('assist_id');
            $table->foreign('assist_id')->references('id')->on('players');
            $table->integer('marktime')->nullable();
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
        Schema::dropIfExists('goals');
    }
}
