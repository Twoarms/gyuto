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
            'index_title' => '1.1',
        	'titleInFr' => 'Informations',
            'titleInEn' => 'Informations',       
        ]);
    }
}
