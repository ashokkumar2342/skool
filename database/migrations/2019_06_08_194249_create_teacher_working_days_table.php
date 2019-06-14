<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_working_days', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('time_table_type_id');
            $table->unsignedInteger('teacher_id');
            $table->text('days_id');
            $table->text('period_id');
            $table->integer('status');
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
        Schema::dropIfExists('teacher_working_days');
    }
}
