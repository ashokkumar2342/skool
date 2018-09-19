<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->increments('id');
             $table->unsignedInteger('vehicle_id'); 
             $table->string('route_length'); 
             $table->string('end'); 
             $table->string('fuel_intake'); 
             $table->string('remaining_fuel'); 
             $table->string('purpose');               
             $table->string('driver_id'); 
             $table->string('helper_id'); 
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
        Schema::dropIfExists('logbooks');
    }
}
