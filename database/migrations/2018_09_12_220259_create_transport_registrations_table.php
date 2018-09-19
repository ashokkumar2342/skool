<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_registrations', function (Blueprint $table) {
            $table->increments('id');
             $table->unsignedInteger('student_id'); 
             $table->unsignedInteger('morning_route_id'); 
             $table->unsignedInteger('evening_route_id'); 
             $table->unsignedInteger('morning_boarding_point_id'); 
             $table->unsignedInteger('evening_boarding_point_id'); 
             $table->string('remark')->nullable(); 
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
        Schema::dropIfExists('transport_registrations');
    }
}
