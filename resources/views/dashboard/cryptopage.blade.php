@extends('layouts.dashboard')

@section('title', 'Crypto')

@section('content')
{{-- ── Balance Card ── --}}
<div class="db-card mb-4">
    <div class="d-flex align-items-center mb-3">
        <i class="bi bi-currency-bitcoin me-3 fs-2 icon-bitcoin"></i>
        <div>
            <small class="text-muted">Main Balance</small>
            <h3 class="fw-bold mb-0">{{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}</h3>
        </div>
    </div>
    <div class="row text-muted small">
        <div class="col-6"><span class="d-block fw-semibold text-uppercase label-xs">Acc Type</span>{{ Auth::user()->account_type }}</div>
        <div class="col-6"><span class="d-block fw-semibold text-uppercase label-xs">Account Owner</span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
    </div>
</div>

{{-- ── Crypto Actions ── --}}
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <a href="{{ route('crypto_deposit') }}" class="db-card d-block text-decoration-none text-center link-card-green">
            <i class="bi bi-arrow-down-circle fs-2 mb-2 d-block"></i>
            <h5 class="fw-semibold mb-1">Crypto Deposit</h5>
            <small>Add crypto to your account</small>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('crypto') }}" class="db-card d-block text-decoration-none text-center link-card-red">
            <i class="bi bi-arrow-up-circle fs-2 mb-2 d-block"></i>
            <h5 class="fw-semibold mb-1">Crypto Withdrawal</h5>
            <small>Send crypto to external wallets</small>
        </a>
    </div>
</div>

{{-- ── Quick Actions ── --}}
<div class="row g-3">
    <div class="col-md-6">
        <a href="{{ route('bank') }}" class="db-card d-flex align-items-center text-decoration-none link-card-primary">
            <i class="bi bi-arrow-left-right fs-4 me-3"></i>
            <span class="fw-semibold">Transfer</span>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('transactions') }}" class="db-card d-flex align-items-center text-decoration-none link-card-success">
            <i class="bi bi-clock-history fs-4 me-3"></i>
            <span class="fw-semibold">View Transactions</span>
        </a>
    </div>
</div>
@endsection