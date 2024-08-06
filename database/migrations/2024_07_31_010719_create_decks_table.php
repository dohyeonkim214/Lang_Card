<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('decks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('completed')->default(false);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('language_id')->unsigned();
            $table->timestamps();
        });

        // 8/6 Mami commented out, This code may need to move to another file or sth.
        // Schema::table('decks', function (Blueprint $table) {
        //     $table->string('title');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decks');
    }
};
