@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <!-- Add more profile fields as needed -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <!-- Display User's Decks -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>All</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
        @if($decks->isEmpty())
        <p class="font-bold mx-auto m-5 text-lg">You don't have any Decks yet.</p>
        @else
        @foreach ($decks as $deck)
        <div class="basis-1/3 p-6">
            <div class="bg-white rounded shadow p-6">
                @if($deck->completed == true)
                <div class="block w-full bg-gray-400 text-white p-1 font-bold">
                    <p>Completed</p>
                </div>
                @endif
                <div class="m-10">
                    <label class="block" for="title">Deck Title:</label>
                    <h2 class="text-2xl">{{ $deck->name }}</h2>
                </div>
                <!-- Buttons -->
                <div class="flex justify-center space-x-4">
                    <form method="post" action="{{ route('decks.destroy', ['deck' => $deck->id]) }}">
                        @csrf
                        @method('delete')
                        <button class="block bg-red-400 text-white p-3 font-bold">Delete</button>
                    </form>
                    
                    <form method="get" action="{{ route('decks.edit', ['deck' => $deck->id]) }}">
                        <button class="block bg-sky-400 text-white p-3 font-bold">Update</button>
                    </form>

                    <form method="get" action="{{ route('flashcards.show', ['deck' => $deck->id]) }}">
                        <button class="block bg-green-400 text-white p-3 font-bold">Open</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <!-- Language Specific Decks -->
    @foreach ([['English', 1], ['French', 2], ['Spanish', 3], ['Korean', 4], ['Japanese', 5]] as $lang)
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>{{ $lang[0] }}</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
        @foreach ($decks as $deck)
        @if($deck->language_id == $lang[1])
        <div class="basis-1/3 p-6">
            <div class="bg-white rounded shadow p-6">
                @if($deck->completed == true)
                <div class="block w-full bg-gray-400 text-white p-1 mb-3 font-bold">
                    <p>Completed</p>
                </div>
                @endif
                <div class="m-10">
                    <label class="block" for="title">Deck Title:</label>
                    <h2 class="text-2xl">{{ $deck->name }}</h2>
                </div>
                <!-- Buttons -->
                <div class="flex justify-center space-x-4">
                    <form method="post" action="{{ route('decks.destroy', ['deck' => $deck->id]) }}">
                        @csrf
                        @method('delete')
                        <button class="block bg-red-400 text-white p-3 font-bold">Delete</button>
                    </form>
                    
                    <form method="get" action="{{ route('decks.edit', ['deck' => $deck->id]) }}">
                        <button class="block bg-sky-400 text-white p-3 font-bold">Update</button>
                    </form>

                    <form method="get" action="{{ route('flashcards.show', ['deck' => $deck->id]) }}">
                        <button class="block bg-green-400 text-white p-3 font-bold">Open</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endforeach
</div>
@endsection
