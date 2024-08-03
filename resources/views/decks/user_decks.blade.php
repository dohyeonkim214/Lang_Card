<div class="deck-list mt-4">
    @if ($deckLanguages->isEmpty())
        <div class="alert alert-info" role="alert">
            No List Yet!
        </div>
    @else
        @foreach ($deckLanguages as $language => $decks)
            <div class="language-section">
                <h3>{{ $language }}</h3>
                <div class="row">
                    @foreach ($decks as $deck)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $deck->title }}</h5>
                                    <p class="card-text">
                                        {{ $deck->is_completed ? 'Complete' : 'Incomplete' }}
                                    </p>
                                    <a href="{{ route('decks.show', $deck) }}" class="btn btn-primary">Open</a>
                                    <a href="{{ route('decks.edit', $deck) }}" class="btn btn-secondary">Edit</a>
                                    <form action="{{ route('decks.destroy', $deck) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this deck?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>
