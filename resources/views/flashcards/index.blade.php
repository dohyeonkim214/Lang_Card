<x-app-layout>

<div class="mt-5 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
        <h2>{{ $deck->title }} - Flashcards</h2>
    </div>
</div>

<div class="mt-10 m-20">
    @if ($flashcards->isEmpty())
        <p>No flashcards yet!</p>
    @else
        <ul>
        @foreach ($flashcards as $flashcard)
            <li class="m-3 bg-white p-5 text-center">
                <span>{{ $flashcard->another_language_text }} - {{ $flashcard->english_text }}</span>
                <!-- buttons -->
                <div class="" role="group">
                    <form class="m-5" method="get" action="{{ route('flashcards.edit', $flashcard) }}">
                        <button class="block w-full bg-sky-400 text-white p-3 font-bold">Edit</button>
                    </form>
                    <form action="{{ route('flashcards.destroy', $flashcard) }}" method="POST" class="m-5">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="block w-full bg-red-400 text-white p-3 font-bold" onclick="return confirm('Do you really want to delete this one?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
        </ul>
    @endif
</div>

<div>
    <form class="m-5" method="get" action="{{ route('flashcards.create', $deck) }}">
        <button class="block w-30 bg-sky-400 text-white p-3 font-bold">Create Flashcard</button>
    </form>
    <form class="m-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
        <button class="block w-30 bg-gray-400 text-white p-3 font-bold">< Back to Flashcard List</button>
    </form>
</div>
</x-app-layout>
