@extends('layouts.dashboard')

@section('title', 'Transfer Authorization')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card">
            <h4 class="mb-3">Transfer Authorization Code</h4>
            <p>Enter a valid Transfer Authorization code for this transaction.</p>

            <form action="{{ route('otp.pin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">OTP Code</label>
                    <input type="number" name="otp" id="otp" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-accent w-100">Proceed</button>
            </form>
        </div>
    </div>
</div>
@endsection
