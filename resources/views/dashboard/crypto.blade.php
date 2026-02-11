@extends('layouts.dashboard')

@section('title', 'Crypto Withdrawal')

@section('content')
{{-- ── Balance ── --}}
<div class="db-card d-flex justify-content-between align-items-center mb-4">
    <div>
        <small class="text-muted">Available Balance</small>
        <h3 class="fw-bold mb-0">{{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}</h3>
    </div>
    <i class="bi bi-currency-bitcoin fs-1 icon-bitcoin"></i>
</div>

<div class="row">
    {{-- ── Withdrawal Form ── --}}
    <div class="col-lg-7">
        <div class="db-card">
            <h5 class="fw-semibold mb-3">Withdraw Crypto</h5>

            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                You're about to transfer from your account. This action cannot be reversed.
            </div>

            <form action="{{ route('crypto.transfer') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="Enter amount" required min="0" step="any">
                </div>

                <div class="mb-3">
                    <label class="form-label">Wallet Type</label>
                    <select class="form-select" name="wallet_type" required>
                        <option value="Bitcoin" selected>Bitcoin (BTC)</option>
                        <option value="Ethereum">Ethereum (ETH)</option>
                        <option value="Litecoin">Litecoin (LTC)</option>
                        <option value="USDT">USDT</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Wallet Address</label>
                    <input type="text" name="wallet_address" class="form-control" placeholder="Enter wallet address" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Transaction PIN</label>
                    <input type="password" name="transaction_pin" class="form-control" placeholder="Enter 4-digit PIN" maxlength="4" required>
                </div>

                <button type="submit" class="btn btn-accent w-100 py-2">
                    <i class="bi bi-arrow-up-circle me-1"></i> Withdraw Crypto
                </button>
            </form>
        </div>
    </div>

    {{-- ── Quick Links ── --}}
    <div class="col-lg-5">
        <a href="{{ route('crypto_deposit') }}" class="db-card d-flex align-items-center text-decoration-none mb-3 link-card-green">
            <i class="bi bi-arrow-down-circle fs-4 me-3"></i>
            <span class="fw-semibold">Deposit Crypto</span>
        </a>
        <a href="{{ route('crypto_page') }}" class="db-card d-flex align-items-center text-decoration-none mb-3 link-card-accent">
            <i class="bi bi-currency-bitcoin fs-4 me-3"></i>
            <span class="fw-semibold">Crypto Hub</span>
        </a>
        <a href="{{ route('transactions') }}" class="db-card d-flex align-items-center text-decoration-none link-card-teal">
            <i class="bi bi-clock-history fs-4 me-3"></i>
            <span class="fw-semibold">View Transactions</span>
        </a>
    </div>
</div>
@endsection