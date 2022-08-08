<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCookieStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cookie_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('visitorID', 255);
            $table->string('ip', 255);
            $table->string('sprache', 255);
            $table->string('sprachelang', 255);
            $table->string('browser', 255);
            $table->string('agent', 255);
            $table->string('platform', 255);
            $table->string('url', 255);
            $table->string('previos', 255);
            $table->boolean('isRobot')->default(false);
            $table->boolean('isMobil')->default(false);
            $table->boolean('cookie_allow')->default(false);
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
        Schema::dropIfExists('cookie_statistics');
    }
}
