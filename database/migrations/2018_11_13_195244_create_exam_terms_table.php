<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_terms', function (Blueprint $table) {
            $table->increments('id'); 
            $table->date('from_date')->nullable();  
            $table->date('to_date')->nullable();  
            $table->string('percentage_include_final_exam')->nullable(); 
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
        Schema::dropIfExists('exam_terms');
    }
}
