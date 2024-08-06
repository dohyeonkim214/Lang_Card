@extends('layouts.template')

@section('content')
<div class="flex flex-wrap">
    @if($userDecks->isEmpty())
    <p class="font-bold mx-auto m-5 text-lg">You don't have any Decks yet.</p>
    @else
    @foreach ($userDecks as $deck)
    <div class="basis-1/3 p-6">
        <div class="bg-white rounded shadow p-6">
            @if($deck->completed == true)
            <div class="block w-full bg-gray-400 text-white p-1 font-bold">
                <p>Completed</p>
            </div>
            @endif
            <div class="m-10">
                <label class="block" for="title">Deck Title:</label>
                <h2 class="text-2xl">{{ $deck->title }}</h2>
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

                <form method="get" action="{{ route('flashcards.view', ['deck' => $deck->id]) }}">
                    <button class="block bg-green-400 text-white p-3 font-bold">Open</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection
