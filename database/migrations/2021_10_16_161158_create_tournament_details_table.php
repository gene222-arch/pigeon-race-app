<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->unsignedDouble('points')->default(0);
            $table->unsignedDouble('speed_per_miniute', 2)->default(0);
            $table->unsignedDouble('leg_1_meter_per-minute', 2)->default(0);
            $table->unsignedDouble('leg_2_meter_per-minute', 2)->default(0);
            $table->unsignedDouble('leg_3_meter_per-minute', 2)->default(0);
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
        Schema::dropIfExists('tournament_details');
    }
}
