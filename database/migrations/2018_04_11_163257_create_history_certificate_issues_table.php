<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryCertificateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_certificate_issues', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('student_id'); 
           $table->string('certificate_type');
           $table->string('file_name')->nullable();
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
        Schema::dropIfExists('history_certificate_issues');
    }
}
