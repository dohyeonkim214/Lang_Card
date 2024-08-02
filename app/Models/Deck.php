<?php

namespace App\Models;

use App\Http\Controllers\FlashcardController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flashcards;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Deck extends Model
{
    use HasFactory;

    public function user () : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function flashcards () : BelongsToMany {
        return $this->belongsToMany(  FlashcardController::class);
    }
    public function language () : BelongsTo {
        return $this->belongsTo(Language::class);
    }
}