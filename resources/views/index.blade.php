@extends('layouts.template')

@section('title', 'Home')

@section('heading', 'Deck List')

@section('content')
    <div class="deck-list">
        <h2>Discover User's Decks</h2>
        <div class="row">
            @if ($decks->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        No list yet!
                    </div>
                </div>
            @else
                @foreach ($decks as $deck)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $deck->title }}</h5>
                                <a href="{{ route('flashcard.view', $deck) }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

