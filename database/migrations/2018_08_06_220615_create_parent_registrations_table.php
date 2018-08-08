<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_registrations', function (Blueprint $table) {
            $table->increments('id');
             $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email_otp')->nullable();
            $table->boolean('email_verify')->nullable();
            $table->boolean('mobile_verify')->nullable();
            $table->string('mobile_otp')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('password')->nullable();            
            $table->string('tem_pass')->nullable(); 
            $table->string('name');
            $table->string('nick_name')->nullable();;
            $table->string('registration_no')->unique();;
            // $table->string('admission_no')->unique()->nullable();
            // $table->string('roll_no')->unique();
            $table->unsignedInteger('academic_year_id');
            $table->unsignedInteger('class_id')->nullable();
            $table->unsignedInteger('section_id')->nullable();
            $table->date('date_of_admission')->nullable();
            $table->date('date_of_leaving')->nullable();
            $table->date('date_of_activation')->nullable();
           
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob');
            $table->unsignedInteger('gender_id')->nullable();
            $table->unsignedInteger('religion_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->text('p_address')->nullable();
            $table->text('c_address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('pincode')->nullable();
            
            $table->string('mother_mobile')->nullable();
            $table->unsignedInteger('student_status_id')->default(1);
            $table->string('picture')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_registrations');
    }
}
