<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentencesTable extends Migration
{
    public function up()
    {
        Schema::create('sentences', function (Blueprint $table) {
            $table->id();
            $table->text('sentence');
            $table->boolean('completed')->default(false);
            $table->foreignId('language_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sentences');
    }
}

?>
