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
            $table->string('legendMFr');
            $table->string('legendMEn');
            $table->string('titleMFr');
            $table->string('titleMEn');
            $table->LongText('textMFr');
            $table->LongText('textMEn');
            $table->string('titleAlbum');            
            $table->string('urlAlbumMusicCdeFr');
            $table->string('urlAlbumMusicCdeEn');            
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
