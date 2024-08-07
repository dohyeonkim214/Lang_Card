<x-app-layout>
<div class="container">
    <form method="POST" action="{{ isset($deck) ? route('decks.update', $deck) : route('decks.store') }}">
        @csrf
        @if(isset($deck))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Deck Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $deck->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="language_id" class="form-label">Language Selection</label>
            <select class="form-select" id="language_id" name="language_id" required>
                <option value="" disabled selected>Select Language</option>
                @foreach($languages as $language)
                    <option value="{{ $language->id }}" {{ isset($deck) && $deck->language_id == $language->id ? 'selected' : '' }}>{{ $language->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($deck) ? 'Update Deck' : 'Create Deck' }}</button>
    </form>
</div>
</x-app-layout>