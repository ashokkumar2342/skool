<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProfileReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profile_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('report_for_id')->nullable();
            $table->unsignedInteger('class_id')->nullable();
            $table->unsignedInteger('section_id')->nullable();
            $table->unsignedInteger('registration_no')->nullable();
            $table->unsignedInteger('report_wise_id')->nullable();
            $table->string('field_name')->nullable();
            $table->string('section_name')->nullable();
            $table->unsignedInteger('status');
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
        Schema::dropIfExists('student_profile_reports');
    }
}
