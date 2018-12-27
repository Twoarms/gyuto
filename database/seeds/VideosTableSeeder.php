<?php

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'titleVFr' => 'Belle vidéo',
            'titleVEn' => 'Nice video',
            'category' => '1',
            'citationVFr' => 'Il était une fois',
            'citationVEn' => 'Once upon a time',
            'legendVFr' => 'Vidéo Gyuto',
            'legendVEn' => 'Gyuto Video',
            'urlVideoFr' => 'https://www.bigbuckbunny.org/',
            'urlVideoEn' => 'https://www.bigbuckbunny.org/',
            'durationVideo' => '10.026666',
        ]);
    }
}
