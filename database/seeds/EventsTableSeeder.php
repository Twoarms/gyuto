<?php

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
       		'title' => 'title',
            'datestart' => '20181022',
            'dateend' => '20191022',
            'hourstart' => '12:00',            
            'hourend' => '14:00',
            'place' => 'place',
            'number' => 'number',
            'street' => 'street',
            'zipCode' => 'zipCode',
            'city' => 'city',
            'country' => 'country',
            'descriptionfr' => 'rezreerzerzerezr',
            'descriptionen' => 'aaaaaaaaaaaaaaaaaaawwwwwwwwwwwwww',
        ]);
    }
}
