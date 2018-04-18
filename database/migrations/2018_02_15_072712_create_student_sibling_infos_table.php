<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSiblingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_sibling_infos', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('student_id');                     
           $table->unsignedInteger('student_sibling_id'); 
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
        Schema::dropIfExists('student_sibling_infos');
    }
}
