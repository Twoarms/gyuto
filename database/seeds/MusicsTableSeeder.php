<?php

use Illuminate\Database\Seeder;
use App\Models\Music;

class MusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Music::create([
			'urlVideoMusic' => 'urlVideoMusic',
	        'legendFr' => 'legendFr',
	        'legendEn' => 'legendEn',
	        'titleFr' => 'titleFr',
	        'titleEn' => 'titleEn',
	        'textFr' => 'textFr',
	        'textEn' => 'textEn',
	        'titleAlbumFr' => 'titleAlbumFr',
	        'titleAlbumEn' => 'titleAlbumEn',
	        'urlAlbumMusic' => 'urlAlbumMusic',
	        'urlMusic' => 'urlMusic',
	        'titleMusic' => 'titleMusic', 
    	]);
    }
}
