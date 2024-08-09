<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Deck;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlashcardController extends Controller
{

    // show the flashcards in managing page (/flashcards/index)
    public function index(Deck $deck)
    {
        $flashcards = Flashcard::where('deck_id', $deck->id)->get();
        $languages = Language::all();
        $decks = Deck::all();
        return view('flashcards.index', compact('deck', 'flashcards', 'languages', 'decks'));
    }

    // show the flashcard edit page
    public function edit(Flashcard $flashcard)
    {
        $decks = Deck::where([
            ['user_id', Auth::id()],
            ['language_id', $flashcard->language_id]
        ])->get();
        $language = Language::where('id', $flashcard->language_id)->first();

        return view('flashcards.edit', compact('flashcard', 'decks', 'language'));
    }

    // update the flashcard
    public function update(Request $request, Flashcard $flashcard)
    {
        $request->validate([
            'english_text' => 'required|string|max:255',
            'second_language_text' => 'required|string|max:255',
            'deck_id' => 'required|exists:decks,id',
            'second_deck_id' => 'nullable|exists:decks,id',
            'third_deck_id' => 'nullable|exists:decks,id'
        ]);

        $flashcard->english_text = $request->input('english_text');
        $flashcard->second_language_text = $request->input('second_language_text');
        $flashcard->language_id = $flashcard->language_id;
        $flashcard->deck_id = $request->input('deck_id');
        $flashcard->second_deck_id = $request->input('second_deck_id');
        $flashcard->third_deck_id = $request->input('third_deck_id');
        $flashcard->save();

        return redirect()->route('flashcards.index', $flashcard->deck_id)->with('success', 'Flashcard updated successfully.');
    }

    // Delete flashcard
    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();
        return back()->with('success', 'Flashcard deleted successfully.');
    }

    // Show the flashcard create page
    public function create(Deck $deck)
    {
        $decks = Deck::where([
            ['user_id', Auth::id()],
            ['language_id', $deck->language_id]
        ])->get();
        $language = Language::where('id', $deck->language_id)->first();
        return view('flashcards.create', compact('deck', 'decks', 'language'));
    }

    // Create a new flashcard
    public function store(Request $request, Deck $deck)
    {
        $request->validate([
            'english_text' => 'required|string|max:255',
            'second_language_text' => 'required|string|max:255',
            'deck_id' => 'required|exists:decks,id',
            'second_deck_id' => 'nullable|exists:decks,id',
            'third_deck_id' => 'nullable|exists:decks,id'
        ]);

        $flashcard = new Flashcard();
        $flashcard->english_text = $request->input('english_text');
        $flashcard->second_language_text = $request->input('second_language_text');
        $flashcard->deck_id = $request->input('deck_id');
        $flashcard->second_deck_id = $request->input('second_deck_id');
        $flashcard->third_deck_id = $request->input('third_deck_id');
        $flashcard->user_id = auth()->id();
        $flashcard->language_id = $deck->language_id;
        $flashcard->save();

        return redirect()->route('flashcards.index', $deck)->with('success', 'Flashcard added successfully.');
    }




}
