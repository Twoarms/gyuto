<?php

use Illuminate\Database\Seeder;
use App\Models\Imagepage;

class ImagepagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Imagepage::create([
            'titleIFr' => 'titleIFr',
            'titleIEn' => 'titleIEn',
            'legendIFr' => 'legendIFr',
            'legendIEn' => 'legendIEn',
            'nameImage' => 'nameImage',
            'cover' => '0',
        ]);
    }
}