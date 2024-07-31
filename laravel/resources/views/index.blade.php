@extends('template')

@section('title', 'Home')

@section('content')
    <div class="mb-4">
        <input type="text" class="form-control" placeholder="Search...">
    </div>

    <div class="mb-4">
        <h2>Deck list which is created by multiple users. Both login user and unknown user can see them.</h2>
    </div>

    @foreach($languages as $language)
        <div class="mb-4">
            <h3>{{ $language->name }}</h3>
            <div class="d-flex flex-wrap">
                @foreach($language->decks as $deck)
                    <div class="deck-card">
                        <a href="{{ route('decks.show', $deck->id) }}">{{ $deck->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
