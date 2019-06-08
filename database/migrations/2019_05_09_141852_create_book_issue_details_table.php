<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookIssueDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_issue_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_ship_type_id');
            $table->unsignedInteger('accession_no');
            $table->unsignedInteger('no_of_ticket');
            $table->date('issue_date');
            $table->date('issue_up_to_date');
            $table->string('return_able');
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
        Schema::dropIfExists('book_issue_details');
    }
}
