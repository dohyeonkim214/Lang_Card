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
        $languages = Language::whereIn('name', ['English', 'Japanese', 'Korean', 'Chinese', 'Spanish', 'French'])->get();
        return view('userpage.createEdit', compact('languages', 'userDecks'));
    }

    // Create a new Deck
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'language_id' => 'required|exists:languages,id',
        ]);
    
        $deck = new Deck();
        $deck->title = $request->input('title');
        $deck->name = $request->input('name', 'default_name'); // name 컬럼 설정
        $deck->user_id = auth()->id();
        $deck->language_id = $request->input('language_id');
        $deck->save();
    
        // 8/6 Mami Edited. Return to redirect User's Decks list page.
        return redirect()->route('userpage.index')->with('success', 'Deck created successfully.');
    }
























    


    // 8/6 MAMI Commented out. Maybe we don't need
    // public function userDecks()
    // {
    //     $userId = Auth::id();
    //     $userDecks = Deck::where('user_id', $userId)->with('language')->get();
    //     $deckLanguages = $userDecks->groupBy('language.name');

    //     return view('decks.user_decks', compact('deckLanguages', 'userDecks'));
    // }






    public function edit(Deck $deck)
    {
        
        $this->authorize('update', $deck); // Ensure the user can update the deck

        // WE DON'T HAVE CHINESE
        $languages = Language::whereIn('name', ['English', 'Japanese', 'Korean', 'Chinese', 'Spanish', 'French'])->get();        
        return view('userpage.edit', compact('deck', 'languages'));
    }

    public function update(Request $request, Deck $deck)
    {
        $this->authorize('update', $deck); // Ensure the user can update the deck
        $deck->title = $request->title;
        $deck->language_id = $request->language_id;
        $deck->save();

        return redirect()->route('user.decks');
    }

    // 8/6 MAMI commented out. use Mami's destoroy function.
    // public function destroy(Deck $deck)
    // {
    //     $this->authorize('delete', $deck); // Ensure the user can delete the deck
    //     $deck->delete();

    //     return redirect()->route('user.decks');
    // }
    
    public function show(Deck $deck)
    {
        $this->authorize('view', $deck); // Ensure the user can view the deck
        $flashcards = Flashcard::where('deck_id', $deck->id)->get();
        $languages = Language::all(); // Load all languages for selection
        $userDecks = Deck::where('user_id', Auth::id())->get(); // Load user's decks
    
        return view('decks.show', compact('deck', 'flashcards', 'languages', 'userDecks'));
    }
    

    public function updateFlashcards(Request $request, Deck $deck)
    {
        $this->authorize('update', $deck); // Ensure the user can update the deck

        // flashcards가 존재하고 배열인지 확인
        if ($request->has('flashcards') && is_array($request->flashcards)) {
            foreach ($request->flashcards as $id => $data) {
                if (isset($data['delete'])) {
                    Flashcard::destroy($id);
                } else {
                    $flashcard = Flashcard::find($id);
                    $flashcard->english_text = $data['english_text'];
                    $flashcard->another_language_text = $data['another_language_text'];
                    $flashcard->language_id = $data['language_id'];
                    $flashcard->save();
                }
            }
        }

        return redirect()->route('decks.show', $deck)->with('success', 'Flashcards updated successfully.');
    }


    // MAMI'S CODE

    // public function index()
    // {
    //     return view('dashboard', [
    //         "decks" => Deck::all(),
    //         "languages" => Language::all()]);
    // }





}
