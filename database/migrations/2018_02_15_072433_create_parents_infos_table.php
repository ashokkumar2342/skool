<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');            
            $table->unsignedInteger('relation_type_id');            
            $table->string('name');            
            $table->string('education')->nullable();            
            $table->string('occupation')->nullable();            
            $table->integer('income_id')->nullable();             
            $table->string('mobile')->nullable();           
            $table->string('email')->nullable();            
            $table->date('dob')->nullable();             
            $table->date('doa')->nullable();            
            $table->string('office_address')->nullable();            
            $table->string('photo')->nullable();            
            $table->boolean('islive')->nullable();           
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
        Schema::dropIfExists('parents_infos');
    }
}
