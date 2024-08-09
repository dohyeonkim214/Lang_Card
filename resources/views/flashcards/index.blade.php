<x-app-layout>

<div class="mt-5 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
        <h2>{{ $deck->name }}</h2>
    </div>
</div>
<div class="m-20 mt-5">
    <form action="{{ route('decks.update', $deck->id) }}" method="post">
        @csrf
        @method('put')
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Deck Title:</label>
            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $deck->name }}" required>
        </div>
        <div class="mt-5 flex flex-wrap">
            <label class="block text-gray-700 text-sm font-bold mb-2">Deck Language:</label>
            <p class="ml-3">{{ $language->language_name }}</p>
        </div>
        <div class="mt-5 flex flex-wrap">
            <label class="block text-gray-700 text-sm font-bold mb-2">Complete?:</label>
            <input type="checkbox" id="completed" name="completed" class="ml-3" {{ $deck->completed ? 'checked' : '' }}>
        </div>
        <div class="flex flex-wrap justify-center">
            <button type="submit" class="block w-30 bg-sky-400 text-white p-3 font-bold">Update the Deck</button>
        </div>
    </form>
</div>

<div class="mt-5 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
        <h2>Flashcards</h2>
    </div>
</div>

<div class="mt-10 m-20">
    @if ($flashcards->isEmpty())
    <div class="mx-auto text-center">
        <h3 class="font-bold m-5 text-lg">No flashcards yet!</h3>
    </div>
    @else
        <ul>
        @foreach ($flashcards as $flashcard)
            <li class="m-3 bg-white p-5 text-center">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Contents</label>
                    <span>{{ $flashcard->second_language_text }} - {{ $flashcard->english_text }}</span>
                </div>
                <div class="mt-5">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Decks</label>
                    <ul>
                        @foreach ($decks as $d)
                        @if (($d->id == $flashcard->deck_id) || ($d->id == $flashcard->second_deck_id) ||($d->id == $flashcard->third_deck_id))
                        <li>{{ $d->name}} </li>
                        @endif
                        @endforeach
                    </ul>
                </div>

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
    <form class="m-5" method="get" action="{{ route('userpage.index') }}">
        <button class="block w-30 bg-gray-400 text-white p-3 font-bold">< Back to Deck List</button>
    </form>
</div>
</x-app-layout>
