







<!-- MAYBE WE DON'T NEED THIS FILE -->












@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h2>{{ $deck->title }} - Flashcards</h2>
    <div class="mt-4">
        @if ($flashcards->isEmpty())
            <p>No flashcards yet!</p>
        @else
            <ul class="list-group">
                @foreach ($flashcards as $flashcard)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $flashcard->english_text }} - {{ $flashcard->another_language_text }}</span>
                        <div class="btn-group" role="group">
                            <a href="{{ route('flashcards.edit', $flashcard) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form action="{{ route('flashcards.destroy', $flashcard) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this flashcard?')">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <h2 class="mt-4">Create Flashcard</h2>
    <form method="POST" action="{{ route('flashcards.store', $deck) }}">
        @csrf
        <div class="mb-3">
            <label for="english_text" class="form-label">English Text</label>
            <input type="text" class="form-control" id="english_text" name="english_text" required>
        </div>
        <div class="mb-3">
            <label for="another_language_text" class="form-label">Another Language Text</label>
            <input type="text" class="form-control" id="another_language_text" name="another_language_text" required>
        </div>
        <div class="mb-3">
            <label for="language_id" class="form-label">Language Selection</label>
            <select class="form-select" id="language_id" name="language_id" required>
                <option value="" disabled selected>Select Language</option>
                @foreach($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Flashcard</button>
    </form>
</div>
@endsection
