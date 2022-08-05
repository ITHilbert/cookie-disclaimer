<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCookieInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cookie_infos', function (Blueprint $table) {
            $table->id();
            $table->string('Anbieter');
            $table->string('Typ');
            $table->string('ScriptName');
            $table->string('Cookie');
            $table->string('Geltungsbereich');
            $table->longText('Zweck');
            $table->string('Speicherdauer');
            $table->longText('Hinweis');
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
        Schema::dropIfExists('cookie_infos');
    }
}
