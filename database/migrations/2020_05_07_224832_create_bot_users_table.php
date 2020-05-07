<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBotUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bot_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_type_id');
            $table->string('account_id');
            $table->string('phone_number');
            $table->string('name');
            $table->boolean('is_verified');
            $table->boolean('is_admin');
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
        Schema::drop('bot_users');
    }
}
