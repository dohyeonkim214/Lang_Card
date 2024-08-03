<?php

use App\Http\Controllers\DeckController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DeckController::class, 'index'])->name('dashboard');
// Route::get('/dashboard', [DeckController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Using userDeck function in DeckController to get a User's Top Page
Route::get('/userpage/index', [DeckController::class, 'userDeck'])->middleware(['auth', 'verified'])->name('userpage.index');

// Junp to create/edit page
// NEED TO REPLACE LINK
Route::get('/userpage/samplecreate', function () {
    return view('userpage.samplecreate');
})->name('userpage.samplecreate');

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
