<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admins', function (Blueprint $table) {
            $table->increments('id');    
            $table->integer('class_id')->unsigned();                            
            $table->integer('section_id')->unsigned();                            
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('mobile');
            $table->string('token')->nullable();
            $table->string('otp')->nullable();
            $table->string('password');
            $table->boolean('gender')->nullable();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('profile_pic')->nullable();
            $table->ipAddress('login_ip')->nullable();            
            $table->timestampTz('login_at')->nullable();            
            $table->boolean('role_id')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->boolean('r_status')->default(0);
            $table->boolean('w_status')->default(0);
            $table->boolean('d_status')->default(0);
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Admins');
    }
}
