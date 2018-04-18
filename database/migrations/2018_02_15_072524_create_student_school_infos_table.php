<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSchoolInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_school_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->string('house')->nullable();           
            $table->string('medium');            
            $table->string('day_school');            
            $table->integer('extra_activity')->nullable();              
            $table->integer('anyreward')->nullable();              
            $table->string('narration')->nullable();              
            $table->string('religion');            
            $table->string('photo')->nullable();   
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
        Schema::dropIfExists('student_school_infos');
    }
}
