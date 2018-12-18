<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagepageMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagepage_music', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('music_id')->unsigned();
            $table->integer('imagepage_id')->unsigned();
            $table->foreign('music_id')->references('id')->on('musics');
            $table->foreign('imagepage_id')->references('id')->on('imagepages');
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
        Schema::dropIfExists('imagepage_music');
    }
}
