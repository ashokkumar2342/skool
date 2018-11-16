<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_schedule_id');   
            $table->unsignedInteger('student_id');              
            $table->string('marksobt')->nullable();   
            $table->string('rank')->nullable();   
            $table->string('percentile')->nullable();   
            $table->string('result')->nullable();   
            $table->string('discription')->nullable();  
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
        Schema::dropIfExists('mark_details');
    }
}
