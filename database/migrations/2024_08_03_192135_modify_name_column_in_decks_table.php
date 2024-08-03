<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNameColumnInDecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('decks', function (Blueprint $table) {
            $table->string('name')->nullable()->change(); // null을 허용하도록 수정
            // 또는 기본값을 설정하려면 아래와 같이 수정
            // $table->string('name')->default('default_name')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('decks', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change(); // null을 허용하지 않도록 수정
            // 또는 기본값을 설정하려면 아래와 같이 수정
            // $table->string('name')->default(null)->change();
        });
    }
}
