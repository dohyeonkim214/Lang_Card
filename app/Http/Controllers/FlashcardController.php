<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Deck;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlashcardController extends Controller
{
    public function index(Deck $deck)
    {
        $flashcards = Flashcard::where('deck_id', $deck->id)->get();
        $languages = Language::all();
        return view('flashcards.index', compact('deck', 'flashcards', 'languages'));
    }

    public function store(Request $request, Deck $deck)
    {
        $request->validate([
            'english_text' => 'required|string|max:255',
            'another_language_text' => 'required|string|max:255',
            'language_id' => 'required|exists:languages,id'
        ]);

        $flashcard = new Flashcard();
        $flashcard->english_text = $request->english_text;
        $flashcard->another_language_text = $request->another_language_text;
        $flashcard->deck_id = $deck->id;
        $flashcard->user_id = auth()->id();
        $flashcard->language_id = $request->language_id;
        $flashcard->save();

        return redirect()->route('flashcards.index', $deck)->with('success', 'Flashcard added successfully.');
    }

    public function show(Flashcard $flashcard)
    {
        return redirect()->route('FlashCardList', ['flashcard' => $flashcard]);
    }

    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();
        return back()->with('success', 'Flashcard deleted successfully.');
    }

    public function edit(Flashcard $flashcard)
    {
        $languages = Language::all();
        return view('flashcards.edit', compact('flashcard', 'languages'));
    }

    public function update(Request $request, Flashcard $flashcard)
    {
        $request->validate([
            'english_text' => 'required|string|max:255',
            'another_language_text' => 'required|string|max:255',
            'language_id' => 'required|exists:languages,id'
        ]);

        $flashcard->english_text = $request->english_text;
        $flashcard->another_language_text = $request->another_language_text;
        $flashcard->language_id = $request->language_id;
        $flashcard->save();

        return redirect()->route('flashcards.index', $flashcard->deck_id)->with('success', 'Flashcard updated successfully.');
    }

    public function view(Deck $deck)
    {
        $flashcards = $deck->flashcards;
        \Log::info('Flashcards:', ['flashcards' => $flashcards]);
    
        if ($flashcards->isEmpty()) {
            return view('flashcards.view', compact('deck'))->with('error', 'No flashcards available in this deck.');
        }
    
        return view('flashcards.view', compact('deck', 'flashcards'));
    }
    public function next(Deck $deck, Flashcard $flashcard)
    {
        $nextFlashcard = $deck->flashcards()->where('id', '>', $flashcard->id)->orderBy('id')->first();
        if (!$nextFlashcard) {
            $nextFlashcard = $deck->flashcards()->orderBy('id')->first();
        }
        return view('flashcards.view', compact('deck', 'flashcard', 'nextFlashcard'));
    }

    public function prev(Deck $deck, Flashcard $flashcard)
    {
        $prevFlashcard = $deck->flashcards()->where('id', '<', $flashcard->id)->orderBy('id', 'desc')->first();
        if (!$prevFlashcard) {
            $prevFlashcard = $deck->flashcards()->orderBy('id', 'desc')->first();
        }
        return view('flashcards.view', compact('deck', 'flashcard', 'prevFlashcard'));
    }

    public function create(Deck $deck)
    {
        $languages = Language::all();
        return view('flashcards.create', compact('deck', 'languages'));
    }

    public function complete(Deck $deck)
    {
        $deck->completed = true;
        $deck->save();

        return redirect()->route('flashcards.index', $deck)->with('success', 'Deck marked as completed.');
    }
}
