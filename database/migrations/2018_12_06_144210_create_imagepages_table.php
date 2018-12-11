<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::create('imagepages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titleIFr');
            $table->string('titleIEn');
            $table->string('legendIFr');
            $table->string('legendIEn');
            $table->string('nameImage')->nullable();
            $table->boolean('cover');                      
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
        Schema::dropIfExists('imagepages');
    }
}
