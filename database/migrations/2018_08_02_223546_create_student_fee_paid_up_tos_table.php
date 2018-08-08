<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFeePaidUpTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fee_paid_up_tos', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('student_id');
           $table->unsignedInteger('cashbook_id');
           $table->integer('from_month');
           $table->integer('from_year'); 
           $table->integer('to_month'); 
           $table->integer('to_year');  
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
        Schema::dropIfExists('student_fee_paid_up_tos');
    }
}
