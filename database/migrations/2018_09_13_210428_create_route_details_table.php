<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('route_id')->nullable();             
            $table->text('boarding_point_id'); 
            $table->string('morning_time')->nullable(); 
            $table->string('evening_time')->nullable(); 
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
        Schema::dropIfExists('route_details');
    }
}
