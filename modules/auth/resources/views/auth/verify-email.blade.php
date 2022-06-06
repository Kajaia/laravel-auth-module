@extends('auth::layouts.app')

@section('content')
@include('auth::layouts.message')
<div class="col-md-6">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header border-light">
            <h6 class="m-0">Verify Your Email Address</h6>
        </div>
        <div class="card-body">
            Before proceeding, please check your email for a verification link. If you did not receive the email,
            <button class="btn btn-sm btn-link px-0" onclick="return document.querySelector('#verification').submit();">click here to request another</button>.
        </div>
        <form id="verification" action="{{ route('verification.send') }}" method="POST">
            @csrf
        </form>
    </div>
</div>
@endsection