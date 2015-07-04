<?php namespace Stu177\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEventsTable extends Migration
{

    public function up()
    {
        Schema::create('stu177_events_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('stu177_events_categories');
            $table->string('title', 255);
            $table->string('location', 255);
            $table->decimal('price', 5, 2)->nullable();
            $table->text('description')->nullable();
            $table->date('startDate');
            $table->date('endDate');
            $table->time('startTime')->nullable();
            $table->time('endTime')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stu177_events_events');
    }

}
