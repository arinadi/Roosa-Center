<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatedeviceDataTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id');
            $table->integer('device_data_category_id');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('device_data');
    }
}
