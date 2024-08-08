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
        return view('flashcards.index', compact('deck', 'flashcards', 'languages'));
    }

    // show the flashcard edit page
    public function edit(Flashcard $flashcard)
    {
        $languages = Language::all();
        return view('flashcards.edit', compact('flashcard', 'languages'));
    }

    // update the flashcard
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

    // Delete flashcard
    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();
        return back()->with('success', 'Flashcard deleted successfully.');
    }

    // Show the flashcard create page
    public function create(Deck $deck)
    {
        $languages = Language::all();
        return view('flashcards.create', compact('deck', 'languages'));
    }





    
}
