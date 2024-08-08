<?php

use App\Http\Controllers\DeckController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlashcardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Home page (decks/index.blade.php)
Route::get('/', [DeckController::class, 'index'])->name('decks.index');

// 8/6 MAMI added. go to the flashcard list page.
Route::get('/decks/view/{deck}', [DeckController::class, 'openDeck'])->name('decks.view');

// Dashboard page of the login user
Route::get('/userpage/userDashboard', [DeckController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('userpage.userDashboard');

// User's deck Page
Route::get('/userpage/index', [DeckController::class, 'userDeck'])->middleware(['auth', 'verified'])->name('userpage.index');

// Using destory function in DeckController to delete a deck
Route::delete('/userpage/index/decks/{deck}', [DeckController::class, 'destroy'])->middleware(['auth', 'verified']);

// Flashcards managing page.
Route::get('/decks/{deck}/flashcards', [FlashcardController::class, 'index'])->name('flashcards.index');

// Flashcard edit page
Route::get('/flashcards/{flashcard}/edit', [FlashcardController::class, 'edit'])->name('flashcards.edit');

// Update flashcard
Route::put('/flashcards/{flashcard}', [FlashcardController::class, 'update'])->name('flashcards.update');

// Delete Flashcard
Route::delete('/flashcards/{flashcard}', [FlashcardController::class, 'destroy'])->name('flashcards.destroy');

// Flashcard create page
Route::get('/decks/{deck}/flashcards/create', [FlashcardController::class, 'create'])->name('flashcards.create');

// Create new flashcard
Route::post('/decks/{deck}/flashcards', [FlashcardController::class, 'store'])->name('flashcards.store');

// Create page (decks/CreateEdit.blade.php)
Route::get('/userpage/create', [DeckController::class, 'create'])->name('userpage.create');

// Create new deck
Route::post('/decks', [DeckController::class, 'store'])->name('decks.store');























// Route::put('/decks/{deck}', [DeckController::class, 'update'])->name('decks.update');
// Route::put('/decks/{deck}/flashcards', [DeckController::class, 'updateFlashcards'])->name('decks.updateFlashcards');
Route::delete('/decks/{deck}', [DeckController::class, 'destroy'])->name('decks.destroy');


// Flashcard routes




Route::get('/flashcards/{flashcard}', [FlashcardController::class, 'show'])->name('flashcards.show');




// Deck에서 플래시카드를 하나씩 보여주는 라우트
Route::get('/decks/{deck}/flashcards/view', [FlashcardController::class, 'view'])->name('flashcards.view');
Route::get('/decks/{deck}/flashcards/{flashcard}/next', [FlashcardController::class, 'next'])->name('flashcards.next');
Route::get('/decks/{deck}/flashcards/{flashcard}/prev', [FlashcardController::class, 'prev'])->name('flashcards.prev');





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










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
