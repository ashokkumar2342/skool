<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudnetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->string('name');
            $table->string('nick_name')->nullable();;
            $table->string('registration_no')->unique();;
            $table->string('admission_no')->unique()->nullable();
            $table->string('roll_no')->unique();
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('section_id');
            $table->date('date_of_admission');
            $table->date('date_of_leaving');
            $table->date('date_of_activation');
            $table->string('email')->nullable();
            $table->string('username')->unique();
            $table->string('password');            
            $table->string('tem_pass'); 
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('dob');
            $table->unsignedInteger('gender_id');
            $table->unsignedInteger('religion_id');
            $table->unsignedInteger('category_id');
            $table->text('p_address');
            $table->text('c_address')->nullable();
            $table->string('state');
            $table->string('city');
            $table->integer('pincode');
            $table->string('father_mobile');
            $table->string('mother_mobile');
            $table->unsignedInteger('student_status_id')->default(1);;
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
        Schema::dropIfExists('Students');
    }
}
