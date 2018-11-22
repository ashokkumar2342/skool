<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id')->nullable();
            $table->string('minu');
            $table->string('sub_menu_id');
            $table->boolean('r_status')->default('1');
            $table->boolean('w_status')->default('1');
            $table->boolean('d_status')->default('1');
            $table->softDeletes();
            $table->timestamps();
            $table->boolean('status')->default('1');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minus');
    }
}
