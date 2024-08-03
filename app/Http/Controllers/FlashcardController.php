<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Deck;
use App\Models\Language; // Add this line
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    public function store(Request $request, Deck $deck)
    {
        $request->validate([
            'english_text' => 'required|string|max:255',
            'another_language_text' => 'required|string|max:255',
        ]);

        $flashcard = new Flashcard();
        $flashcard->english_text = $request->english_text;
        $flashcard->another_language_text = $request->another_language_text;
        $flashcard->deck_id = $deck->id;
        $flashcard->save();

        return response()->json([
            'success' => true,
            'flashcard' => $flashcard
        ]);
    }
    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();
        $flashcards = Flashcard::where('deck_id', $flashcard->deck_id)->get();

        return view('decks.flashcard_list', compact('flashcards'));
    }

    public function show(Deck $deck)
    {
        $flashcards = Flashcard::where('deck_id', $deck->id)->get();
        $languages = Language::all(); // Load all languages for selection
        
        return view('decks.show', compact('deck', 'flashcards', 'languages'));
    }
}
