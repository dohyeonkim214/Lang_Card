<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Flashcard extends Model
{
    use HasFactory;

    public function user () : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function decks () : BelongsToMany {
        return $this->belongsToMany(Deck::class);
    }

    public function language () : BelongsTo {
        return $this->belongsTo(Language::class);
    }
}
