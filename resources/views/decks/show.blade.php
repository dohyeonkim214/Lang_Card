@extends('layouts.template')

@section('title', $deck->title)

@section('content')
<div class="container">
    <h1>{{ $deck->title }}</h1>
    <h2>Flashcards</h2>
    @if($flashcards->isEmpty())
        <p>No words yet!</p>
    @else
        <ul id="flashcards-list">
            @foreach($flashcards as $flashcard)
                <li id="flashcard-{{ $flashcard->id }}">
                    {{ $flashcard->english_text }} - {{ $flashcard->another_language_text }}
                    <button class="delete-flashcard" data-id="{{ $flashcard->id }}">Delete</button>
                </li>
            @endforeach
        </ul>
    @endif

    <h2>Create Flashcard</h2>
    <form id="create-flashcard-form">
        @csrf
        <div class="mb-3">
            <label for="english_text" class="form-label">English Text</label>
            <input type="text" class="form-control" id="english_text" name="english_text" required>
        </div>
        <div class="mb-3">
            <label for="another_language_text" class="form-label">Another Language Text</label>
            <input type="text" class="form-control" id="another_language_text" name="another_language_text" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Flashcard</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('create-flashcard-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const englishText = document.getElementById('english_text').value;
        const anotherLanguageText = document.getElementById('another_language_text').value;
        const token = document.querySelector('input[name="_token"]').value;

        fetch('{{ route('flashcards.store', $deck) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                english_text: englishText,
                another_language_text: anotherLanguageText
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const flashcardsList = document.getElementById('flashcards-list');
                const newFlashcard = document.createElement('li');
                newFlashcard.id = 'flashcard-' + data.flashcard.id;
                newFlashcard.innerHTML = `
                    ${data.flashcard.english_text} - ${data.flashcard.another_language_text}
                    <button class="delete-flashcard" data-id="${data.flashcard.id}">Delete</button>
                `;
                flashcardsList.appendChild(newFlashcard);
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
@endsection
