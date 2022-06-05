@extends('auth::layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header border-light d-flex align-items-center justify-content-between">
            <h6 class="m-0">Hey, {{ Auth::user()->name }}!</h6>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger px-4 shadow-sm rounded-3">Logout</button>
            </form>
        </div>
        <div class="card-body">
            You're authenticated!
        </div>
    </div>
</div>
@endsection