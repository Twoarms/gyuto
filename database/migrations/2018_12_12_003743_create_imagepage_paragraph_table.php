<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagepageParagraphTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagepage_paragraph', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('imagepage_id')->unsigned();
            $table->integer('paragraph_id')->unsigned();
            $table->foreign('imagepage_id')->references('id')->on('imagepages');
            $table->foreign('paragraph_id')->references('id')->on('paragraphs');                    
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
        Schema::dropIfExists('imagepage_paragraph');
    }
}
