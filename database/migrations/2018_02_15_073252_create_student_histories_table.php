<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');                     
            $table->unsignedInteger('session_id');                     
            $table->unsignedInteger('class_id');                     
            $table->unsignedInteger('section_id');                     
            $table->date('from_date'); 
            $table->date('to_date'); 
            $table->string('remarks'); 
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
        Schema::dropIfExists('student_histories');
    }
}
