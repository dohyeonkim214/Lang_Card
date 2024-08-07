<x-app-layout>

<div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>Create a New Deck</h2>
        </div>
</div>

<div class="m-20">
    <form method="POST" action="{{ isset($deck) ? route('decks.update', $deck) : route('decks.store') }}" class="m-20">
        @csrf
        @if(isset($deck))
            @method('PUT')
        @endif
        <div class="m-3">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Deck Title</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" value="{{ old('title', $deck->title ?? '') }}" required>
        </div>

        <div class="m-3">
            <label for="language_id" class="block text-gray-700 text-sm font-bold mb-2">Language Selection</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="language_id" name="language_id" required>
                <option value="" disabled selected>Select Language</option>
                @foreach($languages as $language)
                    <option value="{{ $language->id }}" {{ isset($deck) && $deck->language_id == $language->id ? 'selected' : '' }}>{{ $language->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="mt-10 block w-full bg-sky-400 text-white p-3 font-bold">{{ isset($deck) ? 'Update Deck' : 'Create Deck' }}</button>
    </form>
</div>
</x-app-layout>