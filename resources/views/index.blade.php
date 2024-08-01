@extends('layouts.template')

@section('title', 'Home')

@section('heading', 'Deck List')

@section('content')
    <div class="deck-list">
        <h2>Your Decks</h2>
        <div class="row">
            @forelse ($decks as $deck)
                <div class="col-md-2 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $deck->title }}</h5>
                            <a href="{{ route('decks.show', $deck) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-2 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>No Decks Available</h5>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <a href="{{ route('decks.create') }}" class="btn btn-success">Create New Deck</a>
    </div>
@endsection
