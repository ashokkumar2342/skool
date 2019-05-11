<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookReserveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_reserve_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_ship_type_id');
            $table->unsignedInteger('book_name_id');
            $table->date('upto_request_date');
            $table->date('request_valid_upto');
            $table->unsignedInteger('status');
            $table->date('issue_date')->nullable();
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
        Schema::dropIfExists('book_reserve_requests');
    }
}
