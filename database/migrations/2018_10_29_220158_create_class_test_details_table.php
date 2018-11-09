<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_test_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_test_id');   
            $table->unsignedInteger('student_id');              
            $table->string('marksobt')->nullable();   
            $table->string('rank')->nullable();   
            $table->string('percentile')->nullable();   
            $table->string('discription')->nullable();   
            $table->string('grade')->nullable();  
            $table->string('created_by')->nullable();   
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
        Schema::dropIfExists('class_test_details');
    }
}
