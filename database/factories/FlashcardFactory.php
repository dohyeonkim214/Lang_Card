<?php

namespace Database\Factories;

use App\Models\Deck;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flashcard>
 */
class FlashcardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "english_text" => $this->faker->sentence(3),
            "second_language_text" => $this->faker->sentence(3),
            "language_id" => Language::inRandomOrder()->first()->id,
            "user_id" => User::inRandomOrder()->first()->id,
            // "deck_id" => Deck::inRandomOrder()->first()->id
        ];
    }
}