<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('logo_path');
            $table->string('name')->unique();
            $table->unsignedDouble('current_balance')->default(0);
            $table->char('entry_fee_reversal', 3)->default('No');
            $table->string('club_coordinates');
            $table->string('player_coordinates');
            $table->string('address');
            $table->string('country');
            $table->char('status', 10)->default('Active');
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
        Schema::dropIfExists('clubs');
    }
}
