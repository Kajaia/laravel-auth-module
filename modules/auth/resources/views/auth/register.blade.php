@extends('auth::layouts.app')

@section('content')
<div class="col-12 col-md-6 col-lg-4">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Your name</label>
            <input type="text" name="name" class="form-control shadow-sm @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" autofocus>

            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control shadow-sm @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email">

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control shadow-sm @error('password') is-invalid @enderror" id="password">

            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control shadow-sm @error('password_confirmation') is-invalid @enderror" id="password_confirmation">

            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary px-4 shadow-sm">Register</button>
        <a href="{{ route('login') }}" class="btn btn-link px-4 text-decoration-none">Login</a>
    </form>
</div>
@endsection