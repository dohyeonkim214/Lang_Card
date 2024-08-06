<?php

use App\Http\Controllers\DeckController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlashcardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [DeckController::class, 'index'])->name('index');
Route::get('/decks/create', [DeckController::class, 'create'])->name('decks.create');
Route::post('/decks', [DeckController::class, 'store'])->name('decks.store');
Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');
Route::get('/decks/{deck}/edit', [DeckController::class, 'edit'])->name('decks.edit');
Route::put('/decks/{deck}', [DeckController::class, 'update'])->name('decks.update');
Route::put('/decks/{deck}/flashcards', [DeckController::class, 'updateFlashcards'])->name('decks.updateFlashcards');
Route::delete('/decks/{deck}', [DeckController::class, 'destroy'])->name('decks.destroy');

// Flashcard routes
Route::get('/decks/{deck}/flashcards', [FlashcardController::class, 'index'])->name('flashcards.index');
Route::post('/decks/{deck}/flashcards', [FlashcardController::class, 'store'])->name('flashcards.store');
Route::get('/flashcards/{flashcard}', [FlashcardController::class, 'show'])->name('flashcards.show');
Route::delete('/flashcards/{flashcard}', [FlashcardController::class, 'destroy'])->name('flashcards.destroy');
Route::get('/flashcards/{flashcard}/edit', [FlashcardController::class, 'edit'])->name('flashcards.edit');
Route::put('/flashcards/{flashcard}', [FlashcardController::class, 'update'])->name('flashcards.update');

// Deck에서 플래시카드를 하나씩 보여주는 라우트
Route::get('/decks/{deck}/flashcards/view', [FlashcardController::class, 'view'])->name('flashcards.view');
Route::get('/decks/{deck}/flashcards/{flashcard}/next', [FlashcardController::class, 'next'])->name('flashcards.next');
Route::get('/decks/{deck}/flashcards/{flashcard}/prev', [FlashcardController::class, 'prev'])->name('flashcards.prev');

// Add the missing create route
Route::get('/decks/{deck}/flashcards/create', [FlashcardController::class, 'create'])->name('flashcards.create');

// This code makes an error "In order to use the Auth::routes() method, please install the laravel/ui package." at vendor/laravel/framework/src/Illuminate/Support/Facades/Auth.php:93. Since we are using breeze, we don't need to install this package. I comment out this code.
// Auth::routes();

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

require __DIR__.'/auth.php';
