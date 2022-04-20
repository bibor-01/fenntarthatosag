<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTevekenysegeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tevekenysegeks', function (Blueprint $table) {
            $table->id();
            $table->string('tevekenyseg_nev');
            $table->integer('pontszam');
            $table->timestamps();
        });

        DB::table('tevekenysegeks')->insert([
            ['tevekenyseg_nev' => "10 km-t gyalogoltam buszozás helyett", 'pontszam' => 3],
            ['tevekenyseg_nev' => "ültettem fát ", 'pontszam' => 5],
            ['tevekenyseg_nev' => "ültettem virágot", 'pontszam' => 4],
            ['tevekenyseg_nev' => "ültettem egyéb növényt", 'pontszam' => 4],
            ['tevekenyseg_nev' => "kevesebb vizet használtam a fürdéshez", 'pontszam' => 3],
            ['tevekenyseg_nev' => "összeszedtem a szemetet egy közterületen, erdőben, stb", 'pontszam' => 3],
            ['tevekenyseg_nev' => "tartós szatyorba vásároltam, nem nylonba ", 'pontszam' => 5]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tevekenysegeks');
    }
}
