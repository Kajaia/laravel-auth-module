@extends('auth::layouts.app')

@section('content')
@include('auth::layouts.message')
<div class="col-12 col-md-6 col-lg-4">
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control shadow-sm @error('email') is-invalid @enderror" id="email" autofocus>

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary px-4 shadow-sm">Send</button>
        <a href="{{ route('login') }}" class="btn btn-link px-4 text-decoration-none">Login</a>
    </form>
</div>
@endsection