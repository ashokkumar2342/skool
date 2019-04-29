<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookAccessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_accessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accession_no');
            $table->unsignedInteger('book_id');
            $table->string('isbn_no');
            $table->unsignedInteger('bill_id'); 
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
        Schema::dropIfExists('book_accessions');
    }
}
