@extends('auth::layouts.app')

@section('content')
<div class="col-12 col-md-6 col-lg-4">
    <form action="{{ route('login') }}" method="POST">
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
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control shadow-sm @error('password') is-invalid @enderror" id="password">

            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input shadow-sm" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary px-4 shadow-sm">Login</button>
        <a href="{{ route('register') }}" class="btn btn-link px-4 text-decoration-none">Register</a>
    </form>
</div>
@endsection