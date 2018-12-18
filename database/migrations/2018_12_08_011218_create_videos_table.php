<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Video;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titleVFr');
            $table->string('titleVEn');
            $table->string('category');
            $table->string('citationVFr');
            $table->string('citationVEn');
            $table->string('legendVFr');
            $table->string('legendVEn');
            $table->string('urlVideo');
            $table->integer('imagepage_id')->nullable()->unsigned();
            // $table->foreign('imagepage_id')->references('id')->on('imagepages');
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
        Schema::dropIfExists('videos');
    }
}