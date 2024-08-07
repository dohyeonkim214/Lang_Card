<x-app-layout>
<div class="container text-center">
    <h1>{{ $deck->title }}</h1>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($flashcards->count() >0)
    @foreach($flashcards as $flashcard)
        <div class="flashcard-container flex flex-wrap justify-center">
            <div class="basis-1/3 p-6">
                <div class="flashcard bg-white rounded shadow m-5 p-5">
                    <label>English</label>
                    <p class="text-2xl">{{ $flashcard->english_text }}</p>
                    <label>{{ $language->name}}</label>
                    <p class="text-2xl">{{ $flashcard->second_language_text }}</p>
                </div>
            </div>
        </div>
        <!-- <div class="navigation-buttons">
            <a href="{{ route('flashcards.prev', ['deck' => $deck->id, 'flashcard' => $flashcard->id]) }}" class="btn btn-secondary">Previous</a>
            <a href="{{ route('flashcards.next', ['deck' => $deck->id, 'flashcard' => $flashcard->id]) }}" class="btn btn-primary">Next</a>
        </div> -->
    @endforeach
    @else
        <h3 class="font-bold mx-auto m-5 text-lg">No flashcard yet!</h3>
        @if (Auth::check())
        <h4>Do you want to create Flashcards?</h4>
        <a href="{{ route('flashcards.create', $deck) }}" class="btn btn-primary">Create Flashcard</a>
         @endif
    @endif

    @if (Auth::id() == $deck->user_id)
    <form class="mb-5" method="get" action="{{ route('userpage.index') }}">
        <button class="block w-full bg-sky-400 text-white p-3 font-bold">Back to Deck List</button>
    </form>
    @else
    <form class="mb-5" method="get" action="{{ route('index') }}">
        <button class="block w-full bg-sky-400 text-white p-3 font-bold">Back to Deck List</button>
    </form>
    @endif
</div>
</x-app-layout>
