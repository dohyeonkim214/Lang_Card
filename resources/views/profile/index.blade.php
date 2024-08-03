@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <!-- Add more profile fields as needed -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
