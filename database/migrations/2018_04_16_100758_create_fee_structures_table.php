<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fee_account_id');
            $table->unsignedInteger('fine_scheme_id');
            $table->string('code',3)->unique();
            $table->string('name',30)->unique();
            $table->boolean('is_refundable')->default('0');
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
        Schema::dropIfExists('fee_structures');
    }
}
