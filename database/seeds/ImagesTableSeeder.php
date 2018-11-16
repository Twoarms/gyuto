<?php

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
        	'titleFr' => 'Image titre',
        	'titleEn' => 'Image title',
        	'galery' => 'Plage',
        	'legendFr' => 'Image Legende Francais',
        	'legendEn' => 'Image Legende Anglais',
        	'cover' => 'O',
        	'urlImage' => 'url image',
        ]);
    }
}
