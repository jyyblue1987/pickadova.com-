<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoUnlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_unlock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_id');
            $table->string('user_id')->nullable();
            $table->string('email');
            $table->string('amount');
            $table->string('link',255)->nullable();
            $table->string('expiry_date',100)->nullable();
            $table->string('txn_id',100)->nullable();
            $table->string('payment_status',100)->default('Pending');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_unlock');
    }
}
