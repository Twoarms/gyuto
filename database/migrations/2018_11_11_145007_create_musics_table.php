<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Music;

class CreateMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('urlVideoMusic');
            $table->string('legendFr');
            $table->string('legendEn');
            $table->string('titleFr');
            $table->string('titleEn');
            $table->LongText('textFr');
            $table->LongText('textEn');
            $table->string('titleAlbumFr');
            $table->string('titleAlbumEn');
            $table->string('urlAlbumMusic');
            $table->string('urlMusic');
            $table->string('titleMusic');
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
        Schema::dropIfExists('musics');
    }
}
