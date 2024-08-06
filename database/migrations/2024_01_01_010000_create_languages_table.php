<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Add this line

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
        public function up()
        {
            Schema::create('languages', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
    
            // Insert default languages
            // 8/6 Mami commented out, This insertion is already happen in seeder file.
            // DB::table('languages')->insert([
            //     ['name' => 'English'],
            //     ['name' => 'Japanese'],
            //     ['name' => 'Korean'],
            //     ['name' => 'Chinese'],
            //     ['name' => 'Spanish'],
            //     ['name' => 'French']
            // ]);
        }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
