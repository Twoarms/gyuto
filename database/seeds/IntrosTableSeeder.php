<?php

use Illuminate\Database\Seeder;
use App\Models\Intro;

class IntrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Intro::create([
        	'urlVideoFr' => 'https://youtu.be/VDB65S6rCC0',
            'urlVideoEn' => 'https://youtu.be/CEGZbjl9J98',
            'quoteVideoFr' => 'Belle vidéo Fr',
            'quoteVideoEn' => 'Beautiful video En',
            'legendVideoFr' => 'Il était une fois',
            'legendVideoEn' => 'Once upon a time',

        ]);
    }
}
