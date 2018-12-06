<?php

use Illuminate\Database\Seeder;
use App\Models\Info;

class InfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::create([
        	'titleFr' => 'rezrzerzrz',
            'titleEn' => 'rezrzererzer',
            'textFr' => 'bbbbbbbbbbbbbbbbbb',
            'textEn' => 'aaaaaaaaaaaaaaaaa',
            'urlImage' => 'li@gggg.com',
        ]);
    }
}
