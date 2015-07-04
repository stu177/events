<?php namespace Stu177\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('stu177_events_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('singular');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stu177_events_categories');
    }

}
