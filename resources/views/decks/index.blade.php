@extends('layouts.template')

@section('title', 'Decks')

@section('heading', 'User Decks')

@section('content')
    <div class="deck-list">
        <div>
            <h2>All User's Decks</h2>
        </div>
        <div class="row">
            @if ($decks->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        No list yet!
                    </div>
                </div>
            @else
            @foreach ($decks as $deck)
                <div class="flashcard-container flex flex-wrap justify-center">
                    <div class="basis-1/3">
                        <div class="flashcard bg-white rounded shadow m-2 p-3">
                            <h5 class="card-title">{{ $deck->title }}</h5>
                            <a href="{{ route('decks.view', ['deck' => $deck->id]) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>

        <div class="mt-5">
            <h2>English</h2>
        </div>
        <div class="row">
            @if ($decks->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        No list yet!
                    </div>
                </div>
            @else
            @foreach ($decks as $deck)
            @if($deck->language_id == 1)
                <div class="flashcard-container flex flex-wrap justify-center">
                    <div class="basis-1/3 p-6">
                        <div class="flashcard bg-white rounded shadow m-2 p-3">
                            <h5 class="card-title">{{ $deck->title }}</h5>
                            <a href="{{ route('decks.view', ['deck' => $deck->id]) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            @endif
        </div>

        <div class="mt-5">
            <h2>French</h2>
        </div>
        <div class="row">
            @if ($decks->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        No list yet!
                    </div>
                </div>
            @else
            @foreach ($decks as $deck)
            @if($deck->language_id == 2)
                <div class="flashcard-container flex flex-wrap justify-center">
                    <div class="basis-1/3 p-6">
                        <div class="flashcard bg-white rounded shadow m-2 p-3">
                            <h5 class="card-title">{{ $deck->title }}</h5>
                            <a href="{{ route('decks.view', ['deck' => $deck->id]) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            @endif
        </div>

        <div class="mt-5">
            <h2>Spanish</h2>
        </div>
        <div class="row">
            @if ($decks->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        No list yet!
                    </div>
                </div>
            @else
            @foreach ($decks as $deck)
            @if($deck->language_id == 3)
                <div class="flashcard-container flex flex-wrap justify-center">
                    <div class="basis-1/3 p-6">
                        <div class="flashcard bg-white rounded shadow m-2 p-3">
                            <h5 class="card-title">{{ $deck->title }}</h5>
                            <a href="{{ route('decks.view', ['deck' => $deck->id]) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            @endif
        </div>
                   

        <div class="mt-5">
            <h2>Korean</h2>
        </div>
        <div class="row">
            @if ($decks->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        No list yet!
                    </div>
                </div>
            @else
            @foreach ($decks as $deck)
            @if($deck->language_id == 4)
                <div class="flashcard-container flex flex-wrap justify-center">
                    <div class="basis-1/3 p-6">
                        <div class="flashcard bg-white rounded shadow m-2 p-3">
                            <h5 class="card-title">{{ $deck->title }}</h5>
                            <a href="{{ route('decks.view', ['deck' => $deck->id]) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            @endif
        </div>

        <div class="mt-5">
            <h2>Japanese</h2>
        </div>
        <div class="row">
            @if ($decks->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        No list yet!
                    </div>
                </div>
            @else
            @foreach ($decks as $deck)
            @if($deck->language_id == 5)
                <div class="flashcard-container flex flex-wrap justify-center">
                    <div class="basis-1/3 p-6">
                        <div class="flashcard bg-white rounded shadow m-2 p-3">
                            <h5 class="card-title">{{ $deck->title }}</h5>
                            <a href="{{ route('decks.view', ['deck' => $deck->id]) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>
@endsection
