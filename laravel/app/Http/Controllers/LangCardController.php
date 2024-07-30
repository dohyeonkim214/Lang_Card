<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LangCard;

class LangCardController extends Controller
{
    public function index()
    {
        $langcards = LangCard::all();
        return view('flashcards.index', compact('langcards'));
    }

    public function create()
    {
        return view('flashcards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        LangCard::create($request->only(['question', 'answer']));

        return redirect()->route('flashcards.index');
    }
}

?>
