<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardForsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('award_fors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('award_id');
            $table->unsignedInteger('student_id');
            $table->tinyInteger('rank_position');
            $table->text('description',200);
            $table->smallInteger('last_updated_by');
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
        Schema::dropIfExists('award_fors');
    }
}
