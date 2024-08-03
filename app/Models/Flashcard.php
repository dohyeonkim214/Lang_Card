<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deck;

class Flashcard extends Model
{
    use HasFactory;

    // Define relationships
    public function decks()
    {
        return $this->belongsToMany(Deck::class);
    }
}
