<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsImagepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums_imagepages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id')->unsigned();
            $table->integer('imagepage_id')->unsigned();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->foreign('imagepage_id')->references('id')->on('imagepages')->onDelete('cascade');
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
        Schema::dropIfExists('albums_imagepages');
    }
}
