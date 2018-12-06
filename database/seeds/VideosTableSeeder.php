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
        	'titleFr' => 'Bonjour',
        	'titleEn' => 'Hello',
        	'category' => 'Paysages',
        	'citationFr' => 'Belle Journée',
        	'citationEn' => 'Nice Day',
        	'legendFr' => 'Il était une fois',
        	'legendEn' => 'Once upon a time',
        	'gif' => 'GIF',
        	'urlVideo' => 'urlvideo',
        ]);
    }
}
