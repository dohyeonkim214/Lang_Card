<?php

namespace Database\Seeders;

use App\Models\Deck;
use App\Models\Flashcard;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlashcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     Flashcard::factory()->count(30)->create();
    // }

    public function run()
    {
    $users = User::all();

    foreach ($users as $user) {
        $decks = Deck::where('user_id', $user->id)->get();

        if ($decks->isNotEmpty()) {
            foreach ($decks as $deck) {
                $languageId = $deck->language_id;
                $validDecks = $decks->filter(function ($d) use ($languageId, $deck) {
                    return $d->language_id === $languageId && $d->id !== $deck->id;
                });

                $secondDeckId = $validDecks->isNotEmpty() ? $validDecks->random()->id : null;
                $thirdDeckId = $validDecks->isNotEmpty() ? $validDecks->random()->id : null;

                Flashcard::factory()->create([
                    'user_id' => $user->id,
                    'deck_id' => $deck->id,
                    'language_id' => $deck->language_id,
                    'second_deck_id' => $secondDeckId,
                    'third_deck_id' => $thirdDeckId
                ]);
            }
        }
    }
}
}
