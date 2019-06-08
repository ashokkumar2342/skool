<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookPurchaseBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_purchase_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->date('book_purchase_date');
            $table->string('vendor_name');
            $table->string('mobile');
            $table->string('email');
            $table->text('address')->nullable(); 
            $table->string('bill_no');
            $table->string('total_amount');
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
        Schema::dropIfExists('book_purchase_bills');
    }
}
