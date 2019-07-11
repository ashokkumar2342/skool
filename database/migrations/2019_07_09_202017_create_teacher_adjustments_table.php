<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_adjustments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('time_table_type_id')->nullable();
            $table->unsignedInteger('teacher_absent_id')->nullable();
            $table->unsignedInteger('teacher_id')->nullable();
            $table->unsignedInteger('class_id')->nullable();
            $table->unsignedInteger('section_id')->nullable();
            $table->unsignedInteger('subject_id')->nullable();
            $table->unsignedInteger('period_id')->nullable();
            $table->unsignedInteger('day_id')->nullable(); 
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
        Schema::dropIfExists('teacher_adjustments');
    }
}
