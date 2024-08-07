<x-app-layout>
<div class="container mt-5">
    <h2>{{ $deck->title }} - Flashcards</h2>
    <div class="mt-4">
        @if ($flashcards->isEmpty())
            <p>No flashcards yet!</p>
        @else
            <ul class="list-group">
                @foreach ($flashcards as $flashcard)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $flashcard->another_language_text }} - {{ $flashcard->english_text }}</span>
                        <div class="btn-group" role="group">
                            <a href="{{ route('flashcards.edit', $flashcard) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('flashcards.destroy', $flashcard) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you really want to delete this one?')">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <a href="{{ route('flashcards.create', $deck) }}" class="btn btn-primary mt-4">Create Flashcard</a>

    <form class="mb-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
        <button class="block w-full bg-green-400 text-white p-3 font-bold">Back to Flashcard list</button>
    </form>
</div>
</x-app-layout>
