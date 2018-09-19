<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_details', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('vehicle_id');
           $table->string('company');
           $table->date('from_date');
           $table->date('to_date');
           $table->string('reciept_no');
           $table->string('amount');
           $table->string('from_office');
           $table->string('type')->nullable(); 
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
        Schema::dropIfExists('insurance_details');
    }
}
