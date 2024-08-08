<x-app-layout>

<div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>Edit Flashcard</h2>
        </div>
</div>
<div class="m-20">
    <form action="{{ route('flashcards.update', $flashcard) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="m-3">
            <label for="english_text" class="block text-gray-700 text-sm font-bold mb-2">English Text</label>
            <input type="text" name="english_text" id="english_text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $flashcard->english_text ?? old('english_text') }}" required>
        </div>

        <div class="m-3">
            <label for="another_language_text" class="block text-gray-700 text-sm font-bold mb-2">Second Language Text</label>
            <input type="text" name="another_language_text" id="another_language_text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $flashcard->another_language_text ?? old('another_language_text') }}" required>
        </div>

        <div class="form-group">
            <label for="language_id" class="block text-gray-700 text-sm font-bold mb-2">Second Language</label>
            <select name="language_id" id="language_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($languages as $language)
                    <option value="{{ $language->id }}" {{ $flashcard->language_id == $language->id ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group m-3">
            <label class="block text-gray-700 text-sm font-bold mb-2">Decks</label>
            <select name="deck_id1" id="deck_id1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($decks as $deck)
                <option value="{{ $deck->id }}" {{ (isset($deck) && $deck->deck_id == $deck->id) ? 'selected' : '' }}>{{ $deck->name }}</option>
                @endforeach
            </select>

            <select name="deck_id2" id="deck_id2" class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option>Select...</option>
                @foreach($decks as $deck)
                    <option value="{{ $deck->id }}">{{ $deck->name }}
                    </option>
                @endforeach
            </select>

            <select name="deck_id3" id="deck_id3" class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option>Select...</option>
                @foreach($decks as $deck)
                    <option value="{{ $deck->id }}">{{ $deck->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="mt-10 block w-full bg-sky-400 text-white p-3 font-bold">Update</button>
    </form>

    <form class="m-5" method="get" action="{{ route('flashcards.index', ['deck' => $flashcard->deck_id]) }}">
        <button class="block w-30 bg-gray-400 text-white p-3 font-bold">< Back to Manage Page</button>
    </form>
</div>
</x-app-layout>