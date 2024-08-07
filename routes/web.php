<?php

use App\Http\Controllers\DeckController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlashcardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

// Home page (decks/index.blade.php)
Route::get('/', [DeckController::class, 'index'])->name('index');

// Create page (decks/CreateEdit.blade.php)
Route::get('/userpage/create', [DeckController::class, 'create'])->name('userpage.create');
Route::post('/decks', [DeckController::class, 'store'])->name('decks.store');

// What this page? (decks/show.blade.php)
Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');

// 8/6 MAMI added. go to the flashcard list page.
Route::get('/decks/view/{deck}', [DeckController::class, 'openDeck'])->name('decks.view');

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
// 8/6 MAMI Commented out. Maybe we don't need
// Route::get('/user-decks', [DeckController::class, 'userDecks'])->name('user.decks');


// MAMI'S CODE


// Route::get('/dashboard', [DeckController::class, 'index'])->name('dashboard');
// Route::get('/dashboard', [DeckController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// this is a top page of the login user
Route::get('/userpage/userDashboard', [DeckController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('userpage.userDashboard');

// Using userDeck function in DeckController to get a User's deck Page
Route::get('/userpage/index', [DeckController::class, 'userDeck'])->middleware(['auth', 'verified'])->name('userpage.index');

// Junp to create/edit page
// NEED TO REPLACE LINK
// Route::get('/decks/CreateEdit', function () {
//     return view('decks.CreateEdit');
// })->name('decks.CreateEdit');

// Using destory function in DeckController to delete a deck
Route::delete('/userpage/index/decks/{deck}', [DeckController::class, 'destroy'])->middleware(['auth', 'verified']);

// Junp to update page
// NEED TO REPLACE
Route::get('/userpage/sampleupdate/{deck}', function ($deck) {
    return view('userpage.sampleupdate', ['deck' => $deck]);
})->name('userpage.sampleupdate');

// Junp to flahshcard page
// NEED TO REPLACE
Route::get('/userpage/sampleflashcard/{deck}', function ($deck) {
    return view('userpage.sampleflashcard', ['deck' => $deck]);
})->name('userpage.sampleflashcard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
