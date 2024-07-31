<?php

namespace Database\Seeders;

use App\Models\Deck;
use App\Models\Language;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        User::factory(9)->create();

        $this->call([
            LanguageSeeder::class,
            DeckSeeder::class,
            FlashcardSeeder::class
        ]);
    }
}
