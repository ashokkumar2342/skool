<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_schedule_id');   
            $table->unsignedInteger('parent_registration_id');              
            $table->unsignedInteger('subject_id');              
            $table->string('gradeobt')->nullable(); 
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
        Schema::dropIfExists('grade_details');
    }
}
