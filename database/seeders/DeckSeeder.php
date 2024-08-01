<?php
namespace Database\Factories;

use App\Models\Deck;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeckFactory extends Factory
{
    protected $model = Deck::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'completed' => $this->faker->boolean,
            'user_id' => 1, // 또는 사용자 ID를 적절히 설정
            'language_id' => $this->faker->numberBetween(1, 2), // 1 또는 2로 설정
        ];
    }
}

?>
