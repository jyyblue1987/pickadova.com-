<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_field', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('label',255)->nullable();
            $table->string('name',255)->nullable();
            $table->tinyInteger('required')->default(0);
            $table->string('input_type',100)->nullable();
            $table->text('option')->nullable();
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
        Schema::dropIfExists('custom_field');
    }
}
