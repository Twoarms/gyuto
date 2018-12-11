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
        	'titleFr' => 'Titre Francais',
        	'titleEn' => 'Titre Francais',        	
        ]);
    }
}
