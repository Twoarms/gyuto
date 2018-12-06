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
        	'legendFr' => 'gfhfghfhfhfg',
            'legendEn' => 'L',
            'urlVideo' => 'ma@gggg.com',
        ]);
    }
}
