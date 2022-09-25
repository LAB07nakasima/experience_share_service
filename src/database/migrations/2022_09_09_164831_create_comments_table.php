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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment');
            $table->timestamps();

            // 外部キーの設定
            $table->bigInteger('comment_post_id')->unsigned();
            $table->foreign('comment_post_id')
                ->references('id')
                ->on('posts')
                // ->onUpdate('cascade')
                ->onDelete('cascade');

            // 外部キーの設定
            $table->bigInteger('comment_user_id')->unsigned();
            $table->foreign('comment_user_id')
                ->references('id')
                ->on('users')
                // ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
