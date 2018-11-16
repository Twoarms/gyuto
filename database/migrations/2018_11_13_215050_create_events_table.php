<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Event;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('dateFrom');
            $table->date('dateEnd');
            $table->time('timeStart');
            $table->time('timeEnd');
            $table->string('numberStreet');
            $table->string('nameStreet');
            $table->string('zipCode');
            $table->string('city');
            $table->string('country');
            $table->LongText('descriptionFr');
            $table->LongText('descriptionEn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
