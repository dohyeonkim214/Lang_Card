<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFlashcardsTableDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flashcards', function (Blueprint $table) {
            // user_id 필드를 nullable로 설정하거나 기본값을 설정
            $table->unsignedBigInteger('user_id')->nullable()->change();

            // language_id 필드를 nullable로 설정하거나 기본값을 설정
            $table->unsignedBigInteger('language_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flashcards', function (Blueprint $table) {
            // 되돌릴 때 원래대로 변경
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->unsignedBigInteger('language_id')->nullable(false)->change();
        });
    }
}

