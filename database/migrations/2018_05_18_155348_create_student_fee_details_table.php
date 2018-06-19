<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fee_details', function (Blueprint $table) {
           $table->increments('id');            
           $table->unsignedInteger('student_id');
           $table->unsignedInteger('fee_structure_last_date_id'); 
           $table->unsignedInteger('concession_id'); 
           $table->decimal('fee_amount'); 
           $table->decimal('concession_amount'); 
           $table->date('last_date'); 
           $table->date('from_date'); 
           $table->date('to_date'); 
           $table->boolean('paid'); 
           $table->boolean('refundable')->default('0'); 
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
        Schema::dropIfExists('student_fee_details');
    }
}
