<?php

use App\Http\Controllers\LangCardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LangCardController::class, 'index']);
Route::get('/create', [LangCardController::class, 'create']);
Route::post('/store', [LangCardController::class, 'store']);

?>