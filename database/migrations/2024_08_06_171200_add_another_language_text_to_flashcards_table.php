<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnotherLanguageTextToFlashcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flashcards', function (Blueprint $table) {
            $table->string('another_language_text')->nullable(); // nullable이 필요 없다면 제거
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
            $table->dropColumn('another_language_text');
        });
    }
}
