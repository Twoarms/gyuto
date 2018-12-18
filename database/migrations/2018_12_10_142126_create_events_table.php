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
            $table->date('datestart');
            $table->date('dateend');
            $table->time('hourstart');
            $table->time('hourend');
            $table->string('place');
            $table->string('number');
            $table->string('street');
            $table->string('zipCode');
            $table->string('city');
            $table->string('country');
            $table->LongText('descriptionfr');
            $table->LongText('descriptionen');
            $table->integer('imagepage_id')->nullable()->unsigned();
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
