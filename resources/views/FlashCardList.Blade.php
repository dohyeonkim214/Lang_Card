@extends('layouts.template')

@section('title', 'Deck Details')

@section('content')
    <div class="container mt-4">
        <h2>Deck Details</h2>
        <p><strong>Name:</strong> {{ $deck->name }}</p>
        <p><strong>Language ID:</strong> {{ $deck->language_id }}</p>
        <p><strong>User ID:</strong> {{ $deck->user_id }}</p>
        <p><strong>Completed:</strong> {{ $deck->completed ? 'Yes' : 'No' }}</p>
        
        <a href="{{ route('decks.edit', $deck) }}" class="btn btn-secondary">Edit</a>

        <form action="{{ route('decks.destroy', $deck) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
        <a href="{{ route('index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
