<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Deck extends Model
{
    use HasFactory;

    public function user () : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function flashcards () {
        return $this->belongsToMany(Flashcard::class, 'deck_flashcard');
    }
    public function language () : BelongsTo {
        return $this->belongsTo(Language::class);
    }
}
