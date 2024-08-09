<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Language;
use App\Models\Flashcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeckController extends Controller
{
    use AuthorizesRequests;

    // Home page. Show the all decks stored in DB
    public function index()
    {
        $decks = Deck::all();
        $deckLanguages = Language::withCount('decks')->get();
        $deckCardCounts = Deck::withCount('flashcards')->get();
        
        return view('decks.index', compact('decks', 'deckLanguages', 'deckCardCounts'));
    }

    // 8/6 MAMI added.
    // open the selected Deck
    public function openDeck(Deck $deck) 
    {
        $flashcards = Flashcard::where('deck_id', $deck->id)->get();
        $language = Language::find($deck->language_id);
        return view('decks.view', compact('deck', 'flashcards', 'language'));
    }

    // User's dashboard page. Show the num of Dacks/Flashcards.
    public function dashboard ()
    {
        $user = Auth::user();
        $decks = $user->decks;
        $flashcards = $user->flashcards;

        return view('userpage.userDashboard', compact('user', 'decks', 'flashcards'));
    }

    // User's Decks Page. Show the all Decks login user created
    public function userDeck () {
        return view('userpage.index', [
            "decks" => Auth::user()->decks,
            "languages" => Language::all()]);
    }

    // Delete selected deck
    public function destroy(Deck $deck)
    {
        if (Auth::id() == $deck->user_id) {
            $deck->delete();
        }
        return redirect('/userpage/index');
    }

    // Create deck page
    public function create()
    {
        $userId = Auth::id();
        $userDecks = Deck::where('user_id', $userId)->get();
        $languages = Language::whereIn('language_name', ['English', 'Japanese', 'Korean', 'Spanish', 'French'])->get();
        return view('userpage.createEdit', compact('languages', 'userDecks'));
    }

    // Create a new Deck
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'language_id' => 'required|exists:languages,id',
        ]);
    
        $deck = new Deck();
        $deck->name = $request->input('name');
        $deck->user_id = auth()->id();
        $deck->language_id = $request->input('language_id');
        $deck->save();
    
        // 8/6 Mami Edited. Return to redirect User's Decks list page.
        return redirect()->route('userpage.index')->with('success', 'Deck created successfully.');
    }

    public function update (Request $request, Deck $deck)
    {
        if (Auth::id() == $deck->user_id) {
            $deck->name = $request->name;
            $deck->completed = $request->has('completed');
            $deck->save();
        }

        return redirect()->Route('userpage.index');
    }





}
