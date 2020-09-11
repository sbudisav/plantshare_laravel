<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesPosts extends Migration
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
            $table->string('title');
            $table->text('body');

            $table->timestamps();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->primary('user_id', 'post_id');
            $table->text('body');
            $table->timestamps();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');

            $table->foreignId('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });

        Schema::create('follows', function (Blueprint $table) {
            $table->primary(['user_id', 'followed_user_id']);
            $table->timestamps();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreignId('followed_user_id')
                ->references('id')
                ->on('users')
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
        //
    }
}
