<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->boolean('is_public')->default(true);
            $table->string('club_name');
            $table->string('remarks')->nullable();
            $table->unsignedSmallInteger('legs')->default(2);
            $table->unsignedInteger('birds_count')->default(0);
            $table->time('time_started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('tournaments');
    }
}
