@extends('layouts.dashboard')

@section('title', 'Account Frozen')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card text-center py-5">
            <i class="bi bi-lock-fill text-danger icon-muted-xxl"></i>
            <h5 class="fw-bold mt-3">Account Frozen</h5>
            <p class="text-muted">Your account has been frozen. Please contact the administrator for more information.</p>
            <a href="{{route('dashboard')}}" class="btn btn-accent w-100 mt-3">Go to Home</a>
        </div>
    </div>
</div>
@endsection