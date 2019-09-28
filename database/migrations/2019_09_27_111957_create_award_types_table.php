<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('award_types', function (Blueprint $table) {
            $table->increments('id');
            $table->date('award_date');
            $table->date('last_date');
            $table->string('award_name',150);
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
        Schema::dropIfExists('award_types');
    }
}
