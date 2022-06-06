@extends('auth::layouts.app')

@section('content')
<div class="col-12 col-md-6 col-lg-4">
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
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
            <label for="password" class="form-label">New password</label>
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
        <button type="submit" class="btn btn-primary px-4 shadow-sm">Save</button>
    </form>
</div>
@endsection