<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('eventName');
            $table->string('eventDescription');
            $table->unsignedInteger('eventWinner')->nullable();
            $table->string('eventWinningPrice');
            $table->boolean('eventActiveFlag')->default(true);
            $table->date('eventStartDate');
            $table->date('eventCloseDate');
            $table->foreign('eventWinner')->references('id')->on('participants');
            $table->float('eventVoteCost');
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
        Schema::dropIfExists('evenements');
    }
}
