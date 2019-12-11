<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_seats', function (Blueprint $table) {
            $table->smallInteger('id');
            $table->smallInteger('academic_year_id');
            $table->smallInteger('class_id');
            $table->string('total_seat',20);
            $table->date('from_date');
            $table->date('last_date');
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
        Schema::dropIfExists('admission_seats');
    }
}
