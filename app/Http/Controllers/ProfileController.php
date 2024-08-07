<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deck;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $decks = Deck::where('user_id', $user->id)->get();
        return view('profile.index', compact('user', 'decks'));
    }
}
