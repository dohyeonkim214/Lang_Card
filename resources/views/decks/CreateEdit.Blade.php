<!-- resources/views/decks/create_edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($deck) ? 'Edit Deck' : 'Create Deck' }}</h1>
    <form method="POST" action="{{ isset($deck) ? route('decks.update', $deck) : route('decks.store') }}">
        @csrf
        @if(isset($deck))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="deckTitle" class="form-label">Deck Title</label>
            <input type="text" class="form-control" id="deckTitle" name="title" value="{{ old('title', $deck->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="languageSelection" class="form-label">Language Selection</label>
            <select class="form-select" id="languageSelection" name="language_id">
                @foreach($languages as $language)
                    <option value="{{ $language->id }}" {{ (isset($deck) && $deck->language_id == $language->id) ? 'selected' : '' }}>{{ $language->name }}</option>
                @endforeach
            </select>
        </div>

        @if(isset($deck))
            <h3>Flashcard List in the Deck</h3>
            @foreach($deck->flashcards as $flashcard)
                <div class="flashcard-item mb-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="flashcards[{{ $flashcard->id }}][english_text]" value="{{ $flashcard->english_text }}" placeholder="English">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="flashcards[{{ $flashcard->id }}][another_language_text]" value="{{ $flashcard->another_language_text }}" placeholder="Another Language">
                        </div>
                        <div class="col">
                            <select class="form-select" name="flashcards[{{ $flashcard->id }}][language_id]">
                                @foreach($languages as $language)
                                    <option value="{{ $language->id }}" {{ ($flashcard->language_id == $language->id) ? 'selected' : '' }}>{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="flashcards[{{ $flashcard->id }}][delete]" value="1">
                                Do you want to delete this card?
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <button type="submit" class="btn btn-primary">{{ isset($deck) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
