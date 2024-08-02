<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decks = Deck::all();
        return view('index', ['decks' => $decks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('decks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $deck = new Deck();
        $deck->title = $request->title;
        $deck->user_id = Auth::id();
        $deck->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deck $deck)
    {
        return view('decks.show', compact('deck'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deck $deck)
    {
        return view('decks.edit', compact('deck'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deck $deck)
    {
        if (Auth::id() == $deck->user_id) {
            $deck->title = $request->title;
            $deck->save();
        }

        return redirect()->route('decks.show', $deck);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deck $deck)
    {
        if (Auth::id() == $deck->user_id) {
            $deck->delete();
        }

        return redirect()->route('index');
    }

    /**
     * Display the flashcards of the specified deck.
     */
    public function showFlashcards(Deck $deck)
    {
        $flashcards = $deck->flashcards;
        return view('decks.flashcards', compact('deck', 'flashcards'));
    }
}
