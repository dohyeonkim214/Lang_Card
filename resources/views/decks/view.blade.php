<x-app-layout>

<div class="mt-5 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>{{ $deck->title }}</h2>
    </div>
</div>

<div class="flex flex-wrap items-center justify-center">
    @if(session('error'))
        <div class="text-red-500 font-bold mx-auto my-5 text-lg">
            {{ session('error') }}
        </div>
    @endif

    @if($flashcards->count() >0)
    @foreach($flashcards as $flashcard)
        <div class="basis-1/3 p-6">
            <div class="bg-white rounded shadow p-6">
                <div>
                    <label class="font-bold">English:</label>
                    <p class="text-2xl mb-5 font-bold">{{ $flashcard->english_text }}</p>
                    <label class="font-bold">{{ $language->name}}</label>
                    <p class="text-2xl font-bold">{{ $flashcard->second_language_text }}</p>
                </div>
            </div>
        </div>
    @endforeach
    @else
    <div class="mx-auto text-center">
        <h3 class="font-bold m-5 text-lg">No flashcard yet!</h3>
    </div>
    @endif
</div>

<!-- buttons -->
<div>
    @if (Auth::check() && (Auth::id() == $deck->user_id))
    <div class="flex flex-wrap justify-center">
        <form class="m-5" method="get" action="{{ route('userpage.index') }}">
            <button class="block w-30 bg-gray-400 text-white p-3 font-bold">< Back to Deck List</button>
        </form>
        
        <form class="m-5" method="get" action="{{ route('flashcards.create', $deck) }}">
            <button class="block w-30 bg-sky-400 text-white p-3 font-bold">Create a New Flashcard</button>
        </form>
    </div>

    @else
    <form class="m-5" method="get" action="{{ route('decks.index') }}">
        <button class="block w-30 bg-gray-400 text-white p-3 font-bold">< Back to Deck List</button>
    </form>
    @endif
</div>
</x-app-layout>
