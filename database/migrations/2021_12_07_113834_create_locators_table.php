<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locators', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->string('percent')->nullable();
            $table->string('serial')->unique();
            $table->foreignId('game_id')->constrained('games');
            // $table->foreignId('partner_id')->constrained('partners');
            // $table->foreignId('client_id')->constrained('clients')->nullable();
            $table->string('situation')->nullable();
            // $table->foreignId('esp_id')->constrained('esps')->nullable();
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
        Schema::dropIfExists('locators');
    }
}