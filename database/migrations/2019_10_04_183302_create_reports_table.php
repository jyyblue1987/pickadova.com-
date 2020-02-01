<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->string('user_id',100)->nullable();
             $table->string('name',255)->nullable();
             $table->string('email',100)->nullable();
             $table->string('title',100)->nullable();
             $table->text('report')->nullable();
             $table->string('ip',100)->nullable();
             $table->string('device_address',100)->nullable();
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
        Schema::dropIfExists('report');
    }
}
