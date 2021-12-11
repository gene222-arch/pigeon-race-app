<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyPigeonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_pigeons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('image_path')->nullable();
            $table->string('ring_band')->unique();
            $table->char('gender', 6)->nullable()->default('-');
            $table->string('color')->nullable()->default('-');
            $table->string('remarks')->nullable()->default('N/A');
            $table->string('bloodline')->nullable()->default('N/A');
            $table->string('status')->default('Inactive');
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
        Schema::dropIfExists('my_pigeons');
    }
}
