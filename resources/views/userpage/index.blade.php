<!-- User's Decks Page -->
<x-app-layout>
    <!-- Display User's Decks -->
        <div class="mt-5 bg-white border-b border-gray-100">
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
                        <h2 class="text-2xl">{{ $deck->name }}</h3>
                    </div>
                    <!-- Buttons -->
                    <div class="flex flex-wrap justify-center space-x-4">
                        <form class="mb-5" method="post" action="/userpage/index/decks/{{ $deck->id }}">
                            @csrf
                            @method('delete')
                            <button class="block w-full bg-red-400 text-white p-3 font-bold">Delete</button>
                        </form>

                        <form class="mb-5" method="get" action="{{ route('flashcards.index', ['deck' => $deck->id]) }}">
                            <button class="block w-30 bg-sky-400 text-white p-3 font-bold">Manage</button>
                        </form>

                        <form class="mb-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
                            <button class="block w-full bg-green-400 text-white p-3 font-bold">Open</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        @foreach (['English' => 1, 'French' => 2, 'Spanish' => 3, 'Korean' => 4, 'Japanese' => 5] as $language => $languageId)
        <div class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
                <h2>{{ $language }}</h2>
            </div>
        </div>
        <div class="flex flex-wrap">
            @foreach ($decks as $deck)
            @if($deck->language_id == $languageId)
            <div class="basis-1/3 p-6">
                <div class="bg-white rounded shadow p-6">
                    @if($deck->completed)
                    <div class="block w-full bg-gray-400 text-white p-1 mb-3 font-bold">
                        <p>Completed</p>
                    </div>
                    @endif
                    <div class="m-10">
                        <label class="block" for="title">Deck Title:</label>
                        <h2 class="text-2xl">{{ $deck->name }}</h3>
                    </div>
                    <!-- Buttons -->
                    <div class="flex flex-wrap justify-center space-x-4">
                        <form class="mb-5" method="post" action="/userpage/index/decks/{{ $deck->id }}">
                            @csrf
                            @method('delete')
                            <button class="block w-full bg-red-400 text-white p-3 font-bold">Delete</button>
                        </form>
                        
                        <form class="mb-5" method="get" action="{{ route('flashcards.index', $deck) }}">
                            <button class="block w-30 bg-sky-400 text-white p-3 font-bold">Manage</button>
                        </form>

                        <form class="mb-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
                            <button class="block w-full bg-green-400 text-white p-3 font-bold">Open</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endforeach
</x-app-layout>
