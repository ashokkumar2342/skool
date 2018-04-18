<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',3)->unique();
            $table->string('name',30)->unique();
            $table->string('description',100);            
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
        Schema::dropIfExists('fee_accounts');
    }
}
