<?php
namespace Database\Seeders;

use App\Models\Deck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeckSeeder extends Seeder
{
    // protected $model = Deck::class;

        /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deck::factory()->count(15)->create();
    }

    // Same code is already defined in DeckFactory.php

    // public function definition()
    // {
    //     return [
    //         'name' => $this->faker->word,
    //         'completed' => $this->faker->boolean,
    //         'user_id' => 1, // 또는 사용자 ID를 적절히 설정
    //         'language_id' => $this->faker->numberBetween(1, 2), // 1 또는 2로 설정
    //     ];
    // }
}

?>
