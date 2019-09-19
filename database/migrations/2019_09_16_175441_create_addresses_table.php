<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('primary_mobile')->nullable();
            $table->string('primary_email')->nullable();
            $table->unsignedInteger('cotegory_id')->nullable();
            $table->unsignedInteger('religion')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('p_address')->nullable();
            $table->string('c_address')->nullable();
            $table->string('p_pincode')->nullable();
            $table->string('c_pincode')->nullable();
            $table->string('nationality')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
