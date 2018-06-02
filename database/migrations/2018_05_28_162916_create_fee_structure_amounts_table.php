<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeStructureAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_structure_amounts', function (Blueprint $table) {
                   $table->increments('id');
                   $table->unsignedInteger('fee_structure_id');
                   $table->unsignedInteger('academic_year_id');            
                   $table->decimal('amount');          
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
        Schema::dropIfExists('fee_structure_amounts');
    }
}
