<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Deck;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // General decks view composer
        View::composer(['index', 'decks.index'], function ($view) {
            $decks = Deck::all();
            $deckLanguages = Language::withCount('decks')->get();
            $deckCardCounts = Deck::withCount('flashcards')->get();

            $view->with(compact('decks', 'deckLanguages', 'deckCardCounts'));
        });

        // User-specific decks view composer
        View::composer('decks.user_decks', function ($view) {
            $userId = Auth::id();
            $userDecks = Deck::where('user_id', $userId)->with('language')->get();
            $deckLanguages = $userDecks->groupBy('language.name');

            $view->with(compact('deckLanguages', 'userDecks'));
        });
    }
}
