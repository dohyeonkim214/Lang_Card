@extends('layouts.template')

@section('title', 'Manage Decks')

@section('content')
    <div class="deck-list">
        <h2>Manage Decks</h2>
        <a href="{{ route('decks.create') }}" class="btn btn-primary mb-3">Create New Deck</a>
        @if($decks->isNotEmpty())
            <div class="row">
                @foreach ($decks as $deck)
                    <div class="col-md-2 mb-3">
                        <div class="card">
                            <div class="card-body">
                                {{ $deck->name }}
                                <a href="{{ route('decks.show', $deck) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('decks.edit', $deck) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('decks.destroy', $deck) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No decks available.</p>
        @endif
    </div>
@endsection
