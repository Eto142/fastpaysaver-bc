@extends('layouts.dashboard')

@section('title', 'Fund Account')

@section('content')

{{-- Row 1 — Balance Hero + Account Details --}}
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="balance-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="label">Available Balance</div>
                    <div class="amount">{{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}</div>
                    <div class="sub">{{ Auth::user()->account_type }} &middot; {{ Auth::user()->a_number }}</div>
                </div>
                <div>
                    <i class="bi bi-wallet2 icon-muted-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="row g-3">
            <div class="col-6">
                <div class="stat-card">
                    <div class="stat-icon blue"><i class="bi bi-person-fill"></i></div>
                    <div>
                        <div class="stat-label">Account Owner</div>
                        <div class="stat-value stat-value-sm">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-card">
                    <div class="stat-icon green"><i class="bi bi-hash"></i></div>
                    <div>
                        <div class="stat-label">Account Number</div>
                        <div class="stat-value stat-value-sm">{{ Auth::user()->a_number }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-card">
                    <div class="stat-icon yellow"><i class="bi bi-bank"></i></div>
                    <div>
                        <div class="stat-label">Account Type</div>
                        <div class="stat-value stat-value-sm">{{ Auth::user()->account_type }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-card">
                    <div class="stat-icon red"><i class="bi bi-envelope-fill"></i></div>
                    <div>
                        <div class="stat-label">Email</div>
                        <div class="stat-value stat-value-xs">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Row 2 — Deposit Methods --}}
<div class="db-card mb-4">
    <div class="db-card-header">
        <i class="bi bi-plus-circle me-2"></i> Fund Your Account
    </div>
    <div class="db-card-body">
        <div class="row g-3">
            {{-- Mobile Check Deposit --}}
            <div class="col-md-6">
                <div class="deposit-method-card" data-bs-toggle="modal" data-bs-target="#fiat">
                    <div class="deposit-method-icon accent">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <div class="deposit-method-info">
                        <h6>Mobile Check Deposit</h6>
                        <p>Upload a check slip image to deposit funds</p>
                    </div>
                    <div class="deposit-method-arrow"><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>

            {{-- Crypto Deposit --}}
            <div class="col-md-6">
                <a href="{{ route('cryptopage') }}" class="deposit-method-card text-decoration-none">
                    <div class="deposit-method-icon crypto">
                        <i class="bi bi-currency-bitcoin"></i>
                    </div>
                    <div class="deposit-method-info">
                        <h6>Crypto Deposit</h6>
                        <p>Deposit via Bitcoin, Ethereum or USDT</p>
                    </div>
                    <div class="deposit-method-arrow"><i class="bi bi-chevron-right"></i></div>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Row 3 — Quick Actions --}}
<div class="quick-actions mb-4">
    <a href="{{ route('bank') }}" class="qa-btn"><i class="bi bi-send"></i> Transfer</a>
    <a href="{{ route('transactions') }}" class="qa-btn"><i class="bi bi-clock-history"></i> Transactions</a>
    <a href="{{ route('card') }}" class="qa-btn"><i class="bi bi-credit-card-2-front"></i> Cards</a>
    <a href="{{ route('loan') }}" class="qa-btn"><i class="bi bi-cash-stack"></i> Loans</a>
    {{-- <a href="{{ route('paybills') }}" class="qa-btn"><i class="bi bi-receipt"></i> Pay Bills</a> --}}
</div>

{{-- ── Mobile Check Deposit Modal ── --}}
<div class="modal fade" id="fiat" tabindex="-1" aria-labelledby="fiatLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-clean">
            <div class="modal-header">
                <h5 class="modal-title fw-600" id="fiatLabel"><i class="bi bi-cash-coin me-2 text-primary"></i>Check Deposit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info-soft" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Upload a clear image of your check & enter the exact amount.
                </div>

                <form action="{{ route('make.deposit') }}" method="POST" enctype="multipart/form-data" id="depositForm">
                    @csrf
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                    <div class="mb-3">
                        <label for="pin_amount" class="form-label fw-500">Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">{{ Auth::user()->currency }}</span>
                            <input id="pin_amount" type="number" name="amount" class="form-control" placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="checkImage" class="form-label fw-500">Upload Check Slip</label>
                        <input type="file" class="form-control" id="checkImage" name="front_cheque" accept="image/*" required>
                        <div class="form-text">Accepted formats: JPG, PNG, GIF</div>
                    </div>

                    <div class="mb-4">
                        <label for="transaction_pin" class="form-label fw-500">Transaction PIN</label>
                        <input id="transaction_pin" type="password" name="transaction_pin" maxlength="4" class="form-control" placeholder="Enter 4-digit PIN" required pattern="\d{4}">
                    </div>

                    <button type="submit" class="btn btn-accent w-100 py-2 fw-600">
                        <span id="submitText">Proceed</span>
                        <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none ms-2" role="status"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const depositForm = document.getElementById('depositForm');
    if (depositForm) {
        depositForm.addEventListener('submit', function (e) {
            if (!this.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            } else {
                document.getElementById('submitText').textContent = 'Processing...';
                document.getElementById('loadingSpinner').classList.remove('d-none');
            }
            this.classList.add('was-validated');
        }, false);
    }
});
</script>
@endpush