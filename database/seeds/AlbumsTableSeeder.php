<?php

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::create([
        	'titleFr' => 'Image titre',
        	'titleEn' => 'Image title',
        	// 'galery' => 'Plage',
        	// 'legendFr' => 'Image Legende Francais',
        	// 'legendEn' => 'Image Legende Anglais',
            'image' => '/opt/lampp/htdocs/gyuto/public/myimages/1542614895.jpg',
        ]);
    }
}
