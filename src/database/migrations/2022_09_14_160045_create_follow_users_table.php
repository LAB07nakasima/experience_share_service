<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('followed_user_id');
            $table->unsignedBigInteger('following_user_id');
            $table->unique(['followed_user_id', 'following_user_id']);
            $table->timestamps();

            // 外部キーの設定
            $table->foreign('followed_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('following_user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows_user');
    }
};
