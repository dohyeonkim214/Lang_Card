<!-- User's Top Page -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
        <nav>
            <ul>
                <!-- Default page -->
                <li><a href="">Decks</a></li>
                <!-- Managing page -->
                 <!-- Page name will be changed based on the pattern of Editting Deck/Flashcard -->
                <li><a href="">Create New</a></li>
            </ul>
        </nav>
    </x-slot>

    {{ $decks }}

    <!-- Display User's Decks -->
    <div class="flex flex-wrap">
        <div class="basis-1/3 p-6">
            <div class="bg-white rounded shadow p-6">
                <form class="mb-5" method="post" action="/dashboard/decks/{{ $deck->id }}">
                    <label class="block" for="title">Title</label>
                    <h2>{{ $deck->name }}</h3>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
