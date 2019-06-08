<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->unsignedInteger('event_type_id');
            $table->text('description');
            $table->date('start_date'); 
            $table->date('end_date'); 
            $table->string('incharge_name'); 
            $table->unsignedInteger('event_for_id'); 
            $table->unsignedInteger('class_id'); 
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
        Schema::dropIfExists('event_details');
    }
}
