<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonPlanFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_plan_follows', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lesson_plan_id')->nullable();
            $table->unsignedInteger('class_id')->nullable();
            $table->unsignedInteger('subject_id')->nullable();
            $table->unsignedInteger('section_id')->nullable();
            $table->unsignedInteger('teacher_id')->nullable();
            $table->date('ondate')->nullable();
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
        Schema::dropIfExists('lesson_plan_follows');
    }
}
