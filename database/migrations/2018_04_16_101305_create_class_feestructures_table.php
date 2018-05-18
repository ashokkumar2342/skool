<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassFeestructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_feestructures', function (Blueprint $table) {
           $table->increments('id');
            $table->unsignedInteger('fee_structure_id');
            $table->unsignedInteger('class_id');
           $table->boolean('isapplicable_id');
           $table->softDeletes();        
           $table->timestamps();
           $table->boolean('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_feestructures');
    }
}
