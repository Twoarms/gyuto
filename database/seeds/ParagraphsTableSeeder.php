<?php

use Illuminate\Database\Seeder;
use App\Models\Paragraph;

class ParagraphsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paragraph::create([
            'titleParFr' => 'Titre Francais',
            'titleParEn' => 'Titre Francais',
            'textParFr' => 'Titre Francais',
            'textParEn' => 'Titre Francais',          
        ]);
    }
}
