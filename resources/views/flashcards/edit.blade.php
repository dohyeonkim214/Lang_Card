@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Flashcard</h1>
    
    <form action="{{ route('flashcards.update', $flashcard) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="english_text">English Text</label>
            <input type="text" name="english_text" id="english_text" class="form-control" value="{{ $flashcard->english_text ?? old('english_text') }}" required>
        </div>

        <div class="form-group">
            <label for="another_language_text">Another Language Text</label>
            <input type="text" name="another_language_text" id="another_language_text" class="form-control" value="{{ $flashcard->another_language_text ?? old('another_language_text') }}" required>
        </div>

        <div class="form-group">
            <label for="language_id">Language</label>
            <select name="language_id" id="language_id" class="form-control" required>
                @foreach($languages as $language)
                    <option value="{{ $language->id }}" {{ $flashcard->language_id == $language->id ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
