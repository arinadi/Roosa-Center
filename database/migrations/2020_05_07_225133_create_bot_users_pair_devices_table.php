<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBotUsersPairDevicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bot_users_pair_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('public_key');
            $table->integer('bot_user_id');
            $table->boolean('is_verified');
            $table->boolean('is_blocked');
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
        Schema::drop('bot_users_pair_devices');
    }
}
