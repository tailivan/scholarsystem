<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compet_id');
            $table->foreign('compet_id')->references('id')->on('compets');
            $table->unsignedBigInteger('writer_id');
            $table->foreign('writer_id')->references('id')->on('writers');
            $table->string('title');
            $table->text('body');
            $table->string('portrait');
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
        Schema::dropIfExists('recits');
    }
}
