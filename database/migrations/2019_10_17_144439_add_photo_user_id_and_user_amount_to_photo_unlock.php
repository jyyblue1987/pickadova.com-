<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoUserIdAndUserAmountToPhotoUnlock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo_unlock', function (Blueprint $table) {
           $table->string('photo_user_id'); 
           $table->string('user_amount')->default('0'); 
           $table->string('user_percentage')->default('0'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photo_unlock', function (Blueprint $table) {
            //
        });
    }
}
