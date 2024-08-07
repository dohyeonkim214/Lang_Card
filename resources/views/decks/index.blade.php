<x-app-layout>
    <div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>All User's Decks</h2>
        </div>
    </div>
        <div class="flex flex-wrap">
            @if ($decks->isEmpty())
            <p class="font-bold mx-auto m-5 text-lg">You don't have any Decks yet.</p>
            @else
            @foreach ($decks as $deck)
            <div class="basis-1/3 p-6">
                <div class="bg-white rounded shadow p-6">
                    <div>
                        <h5 class="text-2xl">{{ $deck->title }}</h5>
                        <form class="mt-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
                            <button class="block w-full bg-green-400 text-white p-3 font-bold">View</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    <div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>English</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
        @if ($decks->isEmpty())
        <p class="font-bold mx-auto m-5 text-lg">You don't have any Decks yet.</p>
        @else
        @foreach ($decks as $deck)
        <div class="basis-1/3 p-6">
            <div class="bg-white rounded shadow p-6">
                <div>
                    <h5 class="text-2xl">{{ $deck->title }}</h5>
                    <form class="mt-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
                        <button class="block w-full bg-green-400 text-white p-3 font-bold">View</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>


    <div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>French</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
            @if ($decks->isEmpty())
            <p class="font-bold mx-auto m-5 text-lg">You don't have any Decks yet.</p>
            @else
            @foreach ($decks as $deck)
            <div class="basis-1/3 p-6">
                <div class="bg-white rounded shadow p-6">
                    <div>
                        <h5 class="text-2xl">{{ $deck->title }}</h5>
                        <form class="mt-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
                            <button class="block w-full bg-green-400 text-white p-3 font-bold">View</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
    </div>


    <div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>Spanish</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
            @if ($decks->isEmpty())
            <p class="font-bold mx-auto m-5 text-lg">You don't have any Decks yet.</p>
            @else
            @foreach ($decks as $deck)
            <div class="basis-1/3 p-6">
                <div class="bg-white rounded shadow p-6">
                    <div>
                        <h5 class="text-2xl">{{ $deck->title }}</h5>
                        <form class="mt-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
                            <button class="block w-full bg-green-400 text-white p-3 font-bold">View</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
    </div>                   

    <div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>Korean</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
            @if ($decks->isEmpty())
            <p class="font-bold mx-auto m-5 text-lg">You don't have any Decks yet.</p>
            @else
            @foreach ($decks as $deck)
            <div class="basis-1/3 p-6">
                <div class="bg-white rounded shadow p-6">
                    <div>
                        <h5 class="text-2xl">{{ $deck->title }}</h5>
                        <form class="mt-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
                            <button class="block w-full bg-green-400 text-white p-3 font-bold">View</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
    </div>

    <div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>Japanese</h2>
        </div>
    </div>
    <div class="flex flex-wrap">
            @if ($decks->isEmpty())
            <p class="font-bold mx-auto m-5 text-lg">You don't have any Decks yet.</p>
            @else
            @foreach ($decks as $deck)
            <div class="basis-1/3 p-6">
                <div class="bg-white rounded shadow p-6">
                    <div>
                        <h5 class="text-2xl">{{ $deck->title }}</h5>
                        <form class="mt-5" method="get" action="{{ route('decks.view', ['deck' => $deck->id]) }}">
                            <button class="block w-full bg-green-400 text-white p-3 font-bold">View</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
     </div>
</x-app-layout>
