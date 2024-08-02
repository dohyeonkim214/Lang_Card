@extends('layouts.template')

@section('title', 'Home')

@section('heading', 'Deck List')

@section('content')
    <div class="deck-list">
        <h2>Discover User's Decks</h2>
        <div class="row">
            @php
                $numPlaceholders = 8 - $decks->count();
            @endphp
            @foreach ($decks as $deck)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $deck->title }}</h5>
                            <a href="{{ route('decks.show', $deck) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @for ($i = 0; $i < $numPlaceholders; $i++)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">No Deck Available</h5>
                            <p class="card-text">This is a placeholder for an empty deck.</p>
                            <a href="#" class="btn btn-secondary disabled">View</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <a href="{{ route('decks.create') }}" class="btn btn-success">Create New Deck</a>
    </div>
@endsection
