<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deck>
 */
class DeckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->sentence(3),
            "user_id" => User::inRandomOrder()->first()->id,
            "language_id" => Language::inRandomOrder()->first()->id
        ];
    }
}
