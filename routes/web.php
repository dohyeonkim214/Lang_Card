<?php
use App\Http\Controllers\DeckController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [DeckController::class, 'index'])->name('index');
Route::get('/decks/create', [DeckController::class, 'create'])->name('decks.create');
Route::post('/decks', [DeckController::class, 'store'])->name('decks.store');
Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');
Route::get('/decks/{deck}/edit', [DeckController::class, 'edit'])->name('decks.edit');
Route::put('/decks/{deck}', [DeckController::class, 'update'])->name('decks.update');
Route::delete('/decks/{deck}', [DeckController::class, 'destroy'])->name('decks.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


?>