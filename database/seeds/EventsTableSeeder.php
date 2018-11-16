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
            'dateFrom' => '20181022',
            'dateEnd' => '20191022',
            'timeStart' => '12:00',            
            'timeEnd' => '14:00',
            'numberStreet' => 'numberStreet',
            'nameStreet' => 'nameStreet',
            'zipCode' => 'zipCode',
            'city' => 'city',
            'country' => 'country',
            'descriptionFr' => 'rezreerzerzerezr',
            'descriptionEn' => 'aaaaaaaaaaaaaaaaaaawwwwwwwwwwwwww',
        ]);
    }
}
