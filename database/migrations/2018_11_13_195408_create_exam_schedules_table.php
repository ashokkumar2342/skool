<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_term_id');  
            $table->unsignedInteger('class_id');  
            $table->unsignedInteger('subject_id');  
            $table->date('on_date')->nullable();  
            $table->date('from_date')->nullable();  
            $table->date('to_date')->nullable();  
            $table->string('max_marks')->nullable();  
            $table->string('pass_marks')->nullable();  
            $table->string('fail_marks')->nullable();  
            $table->string('aug_marks')->nullable();  
            $table->string('height_marks')->nullable();  
            $table->string('lowest_marks')->nullable();  
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
        Schema::dropIfExists('exam_schedules');
    }
}
