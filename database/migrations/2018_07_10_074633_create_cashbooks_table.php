<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashbooks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('user_id');
            $table->string('receipt_no');
            $table->date('receipt_date');
            $table->decimal('receipt_amount');
            $table->decimal('deposit_amount');
            $table->decimal('balance_amount');
            $table->string('payment_mode');
            $table->string('refrence_no')->nullable();
            $table->string('payment_mode_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('on_account');
            $table->string('student_name');
            $table->string('class');
            $table->string('roll_no');
            $table->string('registration_no');
            $table->string('father_name');
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
        Schema::dropIfExists('cashbooks');
    }
}
