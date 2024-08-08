<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Flashcard extends Model
{
    use HasFactory;

    protected $fillable = [
        'english_text', 
        'second_language_text',
        'user_id',
        'language_id',
    ];

    public function user () : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function decks () {
        return $this->belongsToMany(Deck::class, 'deck_flashcard');
    }

    public function language () : BelongsTo {
        return $this->belongsTo(Language::class);
    }
}
