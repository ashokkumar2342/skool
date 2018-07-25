<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDefaultValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_default_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');                     
            $table->unsignedInteger('section_id'); 
            $table->string('gender_id'); 
            $table->string('religion_id'); 
            $table->string('category_id'); 
            $table->string('state'); 
            $table->string('city'); 
            $table->string('pincode'); 
            $table->smallInt('month'); 
            $table->smallInt('year'); 
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
        Schema::dropIfExists('student_default_values');
    }
}
