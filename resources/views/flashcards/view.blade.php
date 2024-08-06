@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $deck->title }}</h1>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(isset($flashcard))
        <div class="flashcard-container">
            <div class="flashcard">
                <p>{{ $flashcard->english_text }}</p>
                <p>{{ $flashcard->another_language_text }}</p>
            </div>
        </div>
        <div class="navigation-buttons">
            <a href="{{ route('flashcards.prev', ['deck' => $deck->id, 'flashcard' => $flashcard->id]) }}" class="btn btn-secondary">Previous</a>
            <a href="{{ route('flashcards.next', ['deck' => $deck->id, 'flashcard' => $flashcard->id]) }}" class="btn btn-primary">Next</a>
        </div>
    @else
        <p>No flashcard yet!</p>
        <a href="{{ route('flashcards.create', $deck) }}" class="btn btn-primary">Create Flashcard</a>
    @endif
</div>
@endsection
