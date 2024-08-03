<!-- Sample Dashboard -->

<x-app-layout>
    <div class="container">
        <h1>Sample Dashboard</h1>
        <p>This page is a Sample page. Will be replaced when marging.</p>
    </div>

    @foreach ($decks as $deck)
    <div>
        <h2>{{ $deck->id }}</h2>
        <h4>{{ $deck->name }}</h4>
    </div>
    @endforeach
</x-app-layout>