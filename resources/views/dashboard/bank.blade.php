@extends('layouts.dashboard')

@section('title', 'Bank Transfer')
@section('page-title', 'Bank Transfer')

@section('content')

<div class="row g-4">
    <div class="col-lg-7">
        <div class="db-card mb-4">
            <div class="db-card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted small">Available Balance</span>
                    <span class="fw-700 fs-5">{{ Auth::user()->currency }}{{ number_format($balance, 2) }}</span>
                </div>
            </div>
        </div>

        <div class="db-card">
            <div class="db-card-header">Transfer Details</div>
            <div class="db-card-body">
                <div class="account-alert alert-info-soft">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>You're about to transfer from your account's available balance. Please enter your correct information.</span>
                </div>

                <form action="{{ route('bank.transfer.step2') }}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    <div class="mb-3">
                        <label class="form-label small">Account Name</label>
                        <input type="text" name="account_name" class="form-control" placeholder="Recipient's name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Account Number</label>
                        <input type="text" name="account_number" class="form-control" placeholder="Recipient's account number" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" placeholder="Recipient's bank" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Routing Number</label>
                        <input type="text" name="routing_number" class="form-control" placeholder="Bank routing number" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Next</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="db-card">
            <div class="db-card-header">Quick Links</div>
            <div class="db-card-body">
                <a href="{{ route('skrill') }}" class="d-flex align-items-center gap-3 py-3 border-bottom">
                    <div class="stat-icon blue"><i class="bi bi-wallet2"></i></div>
                    <div><h6 class="mb-0 fw-600">Skrill</h6><span class="text-muted small">Send via Skrill</span></div>
                </a>
                {{-- <a href="{{ route('domestic-transfer') }}" class="d-flex align-items-center gap-3 py-3 border-bottom">
                    <div class="stat-icon green"><i class="bi bi-bank"></i></div>
                    <div><h6 class="mb-0 fw-600">Domestic Transfer</h6><span class="text-muted small">Local bank transfer</span></div>
                </a> --}}
                <a href="{{ route('paypal') }}" class="d-flex align-items-center gap-3 py-3 border-bottom">
                    <div class="stat-icon yellow"><i class="bi bi-paypal"></i></div>
                    <div><h6 class="mb-0 fw-600">PayPal</h6><span class="text-muted small">Send via PayPal</span></div>
                </a>
                <a href="{{ route('crypto') }}" class="d-flex align-items-center gap-3 py-3">
                    <div class="stat-icon red"><i class="bi bi-currency-bitcoin"></i></div>
                    <div><h6 class="mb-0 fw-600">Crypto</h6><span class="text-muted small">Withdraw cryptocurrency</span></div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection