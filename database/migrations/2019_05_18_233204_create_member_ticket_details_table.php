<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTicketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_ticket_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_ship_id');
            $table->unsignedInteger('ticket_no_id');
            $table->unsignedInteger('no_of_days_id');
            $table->string('status');
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
        Schema::dropIfExists('member_ticket_details');
    }
}
