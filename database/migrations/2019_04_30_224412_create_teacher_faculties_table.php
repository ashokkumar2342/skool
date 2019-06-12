<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registration_no');
            $table->string('name');
            $table->string('father_name');
            $table->string('relation_name');
            $table->string('father_mobile');
            $table->date('dob');
            $table->date('joining_date');
            $table->string('email');
            $table->text('c_address')->nullable();
            $table->string('status')->nullable();
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_faculties');
    }
}
