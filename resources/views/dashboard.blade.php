<!-- Sample Dashboard -->

<x-app-layout>
    <div class="mt-5 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 font-bold h-16 text-2xl flex items-center justify-center">
            <h2>Dashboard</h2>
        </div>
    </div>
    
    <h1>Sample page</h1>

    @foreach ($decks as $deck)
    <div>
        <h2>{{ $deck->id }}</h2>
        <h4>{{ $deck->name }}</h4>
    </div>
    @endforeach
</x-app-layout>