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
            $table->foreignId('user_id')->constrained();
            //'user_id'は'usersテーブル'の'id'を参照する外部キー
            $table->foreignId('category_id')->constrained();
            //'category_id'は'categoriesテーブル'の'id'を参照する外部キー
            $table->string('title', 50);
            $table->text('body', 700);
            $table->text('url',100)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
};
