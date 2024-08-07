<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deck;
use App\Models\Language;

class DashboardController extends Controller
{
    public function index()
    {
        $decks = Deck::all();
        $deckLanguages = Language::withCount('decks')->get();
        $deckCardCounts = Deck::withCount('flashcards')->get();
        
        return view('dashboard', compact('decks', 'deckLanguages', 'deckCardCounts'));
    }
}
