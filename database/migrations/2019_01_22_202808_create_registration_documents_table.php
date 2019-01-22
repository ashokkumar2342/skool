<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_documents', function (Blueprint $table) {
         $table->increments('id');
        $table->unsignedInteger('parent_registration_id');                     
         $table->unsignedInteger('document_type_id'); 
         $table->string('name'); 
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
        Schema::dropIfExists('registration_documents');
    }
}
