<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groupid')->comment('粉丝组group_id');
            $table->string('openid',100)->nullable()->comment('OPENID');
            $table->string('nickname',255)->comment('昵称');
            $table->text('remark')->comment('备注');
            $table->enum('sex', ['女','男'])->comment('性别');
            $table->string('language',255)->comment('语言');
            $table->string('city',255)->comment('城市');
            $table->string('province',255)->comment('省');
            $table->string('country',255)->comment('国家');
            $table->string('headimgurl',255)->comment('头像');
            $table->integer('unionid')->comment('unionid');
            $table->string('subscribe_time')->nullable()->default('0000-00-00 00:00:00')->comment('关注时间');
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
        Schema::drop('fans');
    }
}
