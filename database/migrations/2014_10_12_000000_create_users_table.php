<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('password');
            $table->string('address');
            $table->string('lat',50)->nullable();
            $table->string('lang',50)->nullable();
            $table->string('ip',100)->nullable();
            $table->string('device_address',255)->nullable();
            $table->string('state',100)->nullable();
            $table->string('start_work',100)->nullable();
            $table->string('end_work',100)->nullable();
            $table->string('image',255)->default('noimage.jpg');
            $table->enum('type', ['Advertise', 'Browser'])->default('Browser');
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('email_verification')->default(0);   
            $table->tinyInteger('account_verification')->default(0);   
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}


