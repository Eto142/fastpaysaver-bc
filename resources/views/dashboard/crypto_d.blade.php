@extends('layouts.dashboard')

@section('title', 'Crypto Deposit')

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
    {{-- ── Deposit Form ── --}}
    <div class="col-lg-7">
        <div class="db-card">
            <h5 class="fw-semibold mb-3">Deposit Crypto</h5>
            <p class="text-muted mb-3">You're about to deposit into your account balance.</p>

            <form action="{{ url('get-deposit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pay With</label>
                    <select class="form-select" name="item">
                        <option value="Bitcoin" selected>Bitcoin (BTC)</option>
                        <option value="Ethereum">Ethereum (ETH)</option>
                        <option value="Usdt">USDT</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-accent w-100 py-2">
                    <i class="bi bi-arrow-down-circle me-1"></i> Proceed to Payment
                </button>
            </form>
        </div>
    </div>

    {{-- ── Quick Links ── --}}
    <div class="col-lg-5">
        <a href="{{ route('crypto') }}" class="db-card d-flex align-items-center text-decoration-none mb-3 link-card-red">
            <i class="bi bi-arrow-up-circle fs-4 me-3"></i>
            <span class="fw-semibold">Withdraw Crypto</span>
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