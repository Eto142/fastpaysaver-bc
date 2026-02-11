@extends('layouts.dashboard')

@section('title', 'Transfer Funds')

@section('content')
<div class="db-card">
    <h4 class="mb-4 text-center">Transfer Funds</h4>

    <form action="{{ route('transfer.funds') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-sm-6">
                <label class="form-label">Account Name</label>
                <input type="text" name="account_name" class="form-control" placeholder="Enter Account Name" required>
            </div>
            <div class="col-sm-6">
                <label class="form-label">Account Number</label>
                <input type="number" name="account_number" class="form-control" placeholder="Enter Account Number" required>
            </div>
            <div class="col-sm-6">
                <label class="form-label">Bank Name</label>
                <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" required>
            </div>
            <div class="col-sm-6">
                <label class="form-label">Routing Number</label>
                <input type="text" name="routing_number" class="form-control" placeholder="Enter Routing Number" required>
            </div>
            <div class="col-sm-6">
                <label class="form-label">Account Type</label>
                <select name="account_type" class="form-select">
                    <option selected value="Savings Account">Savings Account</option>
                    <option value="Current Account">Current Account</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter Amount ({{ Auth::user()->currency }})" required>
            </div>
            <div class="col-12">
                <label class="form-label">Description (optional)</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="button" class="btn btn-accent" data-bs-toggle="modal" data-bs-target="#otpModal">
                Transfer
            </button>
        </div>

        <!-- OTP Modal -->
        <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="otp" class="form-control" placeholder="Enter OTP">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-accent">Transfer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
