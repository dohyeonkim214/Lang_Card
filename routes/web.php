<?php

use App\Http\Controllers\DeckController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlashcardController; // Import FlashcardController
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', [DeckController::class, 'index'])->name('index');
Route::get('/decks/create', [DeckController::class, 'create'])->name('decks.create');
Route::post('/decks', [DeckController::class, 'store'])->name('decks.store');
Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');
Route::get('/decks/{deck}/edit', [DeckController::class, 'edit'])->name('decks.edit');
Route::put('/decks/{deck}', [DeckController::class, 'update'])->name('decks.update');
Route::put('/decks/{deck}/flashcards', [DeckController::class, 'updateFlashcards'])->name('decks.updateFlashcards');
Route::delete('/decks/{deck}', [DeckController::class, 'destroy'])->name('decks.destroy');

Route::post('decks/{deck}/flashcards', [FlashcardController::class, 'store'])->name('flashcards.store');
Route::delete('flashcards/{flashcard}', [FlashcardController::class, 'destroy'])->name('flashcards.destroy');
Route::get('decks/{deck}/flashcards', [FlashcardController::class, 'show'])->name('flashcards.show');

Auth::routes();

Route::get('/create-user', function () {
    User::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ]);
    return 'User created!';
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/decks', [DeckController::class, 'index'])->name('decks.index');
Route::get('/user-decks', [DeckController::class, 'userDecks'])->name('user.decks');
Route::post('/decks/{deck}/flashcards', [FlashcardController::class, 'store'])->name('flashcards.store');

require __DIR__.'/auth.php';
