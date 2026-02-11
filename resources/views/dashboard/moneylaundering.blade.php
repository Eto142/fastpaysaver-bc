@extends('layouts.dashboard')

@section('title', 'Money Laundering Warning')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card text-center py-5 border border-danger">
            <i class="bi bi-exclamation-triangle-fill text-danger icon-muted-xxl"></i>
            <h5 class="fw-bold mt-3 text-danger">Warning: Money Laundering Activity Detected</h5>
            <p class="text-muted">Suspicious activities have been detected on your account, indicating potential money laundering. Please contact the administrator immediately for further assistance.</p>
            <a href="{{route('dashboard')}}" class="btn btn-danger w-100 mt-3">Go to Home</a>
        </div>
    </div>
</div>
@endsection