<x-app-layout>

<div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>Create New Flashcard</h2>
        </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="text-lg m-20 mt-5 text-center">
    <p>You only can create {{ $language->language_name }} flashcard. <br> If you want to create in another language, please choose proper deck from the Decks Page.</p>
</div>

<div class="m-20">
    <form action="{{ route('flashcards.store', $deck) }}" method="POST" class="m-20">
        @csrf
        @method('POST')

        <div class="form-group m-3">
            <label for="english_text" class="block text-gray-700 text-sm font-bold mb-2">English Text</label>
            <input type="text" name="english_text" id="english_text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="form-group m-3">
            <label for="second_language_text" class="block text-gray-700 text-sm font-bold mb-2">{{ $language->language_name }} Text</label>
            <input type="text" name="second_language_text" id="second_language_text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>


        <div class="form-group m-3">
            <label class="block text-gray-700 text-sm font-bold">Decks</label>
            <small>Only {{ $language->language_name }} decks show in the selection.</small>
            <select name="deck_id" id="deck_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($decks as $deck)
                <option value="{{ $deck->id }}" {{ isset($deck) ? 'selected' : '' }}>{{ $deck->name }}</option>
                @endforeach
            </select>

            <select name="second_deck_id" id="second_deck_id" class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="" >Select...</option>
                @foreach($decks as $deck)
                <option value="{{ $deck->id }}" {{ (isset($flashcard) && $flashcard->second_deck_id == $deck->id) ? 'selected' : '' }}>{{ $deck->name }}</option>
                @endforeach
            </select>

            <select name="third_deck_id" id="third_deck_id" class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Select...</option>
                @foreach($decks as $deck)
                <option value="{{ $deck->id }}" {{ (isset($flashcard) && $flashcard->third_deck_id == $deck->id) ? 'selected' : '' }}>{{ $deck->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="mt-10 block w-full bg-sky-400 text-white p-3 font-bold">Create</button>
    </form>

    <form class="m-5" method="get" action="{{ route('flashcards.index', ['deck' => $deck->id]) }}">
        <button class="block w-30 bg-gray-400 text-white p-3 font-bold">< Back to Manage Page</button>
    </form>
</div>
</x-app-layout>

