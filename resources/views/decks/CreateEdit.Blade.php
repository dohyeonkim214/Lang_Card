@extends('layouts.template')

@section('title', isset($deck) ? 'Edit Deck' : 'Create Deck')

@section('content')
    <h1>{{ isset($deck) ? 'Edit Deck' : 'Create New Deck' }}</h1>
    <form action="{{ isset($deck) ? route('decks.update', $deck) : route('decks.store') }}" method="POST">
        @csrf
        @if (isset($deck))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ isset($deck) ? $deck->title : '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($deck) ? 'Update' : 'Save' }}</button>
    </form>
    <body>

@endsection
