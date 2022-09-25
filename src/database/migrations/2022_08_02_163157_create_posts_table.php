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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained();
            $table->string('title', 100)->comment('タイトル');
            $table->string('contents', 255)->comment('内容');
            $table->timestamps();

            // 外部キーの設定
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        // Schema::table('posts', function (Blueprint $table){
        //     $table->foreign('user_id')
        //     ->after('id')
        //     ->nullable()
        //     ->constrained('users')
        //     ->cascadeOnDelete();

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
