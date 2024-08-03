@extends('layouts.template')

@section('title', 'Dashboard')

@section('heading', 'Dashboard')

@section('content')
    <div class="menu-bar">
        <a href="{{ route('profile') }}">Individual profile</a>
        <a href="{{ route('decks.create') }}">Deck/Create</a>
        <a href="#" id="deck-list-link">Deck/List</a>
    </div>

    <div id="content" class="main-content">
        <header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </header>

        <div class="statistics">
            <div>
                <h3>Languages of Decks</h3>
                @if($deckLanguages->isEmpty())
                    <p>No list yet</p>
                @else
                    <ul>
                        @foreach($deckLanguages as $language)
                            <li>{{ $language->name }}: {{ $language->decks_count }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div>
                <h3>The Number of Cards in each Deck</h3>
                @if($deckCardCounts->isEmpty())
                    <p>No list yet</p>
                @else
                    <ul>
                        @foreach($deckCardCounts as $deck)
                            <li>{{ $deck->title }}: {{ $deck->flashcards_count }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="deck-list mt-4">
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
                                    <a href="{{ route('decks.show', $deck) }}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <a href="{{ route('decks.create') }}" class="btn btn-success">Create New Deck</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('deck-list-link').addEventListener('click', function(event) {
                event.preventDefault();
                fetch('{{ route('user.decks') }}')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('content').innerHTML = html;
                    });
            });
        });
    </script>

    <style>
        .menu-bar {
            width: 200px;
            background-color: #f8f9fa;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
        }
        .menu-bar a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
        .statistics {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .statistics div {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            flex: 1;
            text-align: center;
        }
    </style>
@endsection
