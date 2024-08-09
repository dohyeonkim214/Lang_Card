<x-app-layout>

<div class="mt-5 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
        <h2>Hello {{ $user->name }}!</h2>
    </div>
</div>

<div class="flex flex-wrap justify-center">
    <div class="bg-white rounded shadow p-6 m-3">
        <div class="m-10">
            <h3 class="font-bold">{{ 'You are currently have...' }}</h3>
            <h2 class="text-2xl">{{ $decks->count() }} Decks</h3>
        </div>
    </div>

    <div class="bg-white rounded shadow p-6 m-3">
        <div class="m-10">
            <h3 class="font-bold">{{ 'You have created...' }}</h3>
            <h2 class="text-2xl">{{ $flashcards->count() }} flashcards</h3>
        </div>
    </div>
</div>

</x-app-layout>