<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');   
            $table->unsignedInteger('section_id');   
            $table->unsignedInteger('subject_id');   
            $table->string('test_date')->nullable();   
            $table->string('max_marks')->nullable();   
            $table->string('sylabus')->nullable();   
            $table->text('remarks')->nullable();   
            $table->string('highest_marks')->nullable();   
            $table->string('avg_marks')->nullable();   
            $table->string('is_include_term_exam');   
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
        Schema::dropIfExists('class_tests');
    }
}
