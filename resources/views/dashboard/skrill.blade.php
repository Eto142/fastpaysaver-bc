@extends('layouts.dashboard')

@section('title', 'Skrill Withdrawal')

@section('content')
<div class="d-flex align-items-center mb-3">
    <i class="bi bi-wallet2 skrill-icon"></i>
    <div>
        <h5 class="mb-0 fw-semibold">Skrill Withdrawal</h5>
    </div>
    <div class="ms-auto text-end">
        <span class="text-muted small d-block">
            <span id="accountNumber">{{ Auth::user()->a_number }}</span>
            <i class="bi bi-copy ms-1 clickable" id="copyIcon" onclick="copyAccountNumber()" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard"></i>
        </span>
    </div>
</div>

<!-- Balance Display -->
<div class="transaction-box mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted">Available Balance</span>
        <span class="balance-display-lg">{{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}</span>
    </div>
</div>

<!-- Withdrawal Form -->
<div class="db-card">
    <div class="warning-note">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        You're about to transfer from your account. This action cannot be reversed. Be sure to enter correct details.
    </div>

    <form action="{{ route('skrill.transfer') }}" method="POST" id="skrillForm">
        @csrf
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <div class="input-group">
                <span class="input-group-text">{{ Auth::user()->currency }}</span>
                <input type="number" name="amount" class="form-control" placeholder="Enter amount" required min="0" step="0.01">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Skrill Email</label>
            <input type="email" name="skrill_email" class="form-control" placeholder="Enter Skrill email" required value="{{ Auth::user()->email }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Transaction PIN</label>
            <input type="password" name="transaction_pin" class="form-control" placeholder="Enter 4-digit PIN" maxlength="4" required pattern="\d{4}">
        </div>

        <button type="button" class="btn btn-skrill w-100" data-bs-toggle="modal" data-bs-target="#otpModal">
            <i class="bi bi-arrow-up-circle me-1"></i> Withdraw to Skrill
        </button>

        <!-- OTP Modal -->
        <div class="modal fade @if(session('show_otp')) show @endif" id="otpModal" tabindex="-1" aria-hidden="true" @if(session('show_otp')) style="display:block;" @endif>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-clean">
                    <div class="modal-header">
                        <h5 class="modal-title fw-600"><i class="bi bi-shield-lock me-2"></i>OTP Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <i class="bi bi-shield-lock me-1"></i>
                            Enter the OTP sent to your registered email to confirm this withdrawal.
                        </div>
                        <div class="mb-3">
                            <label class="form-label">OTP Code</label>
                            <input type="number" name="otp" class="form-control" placeholder="Enter OTP">
                        </div>
                        <button type="submit" class="btn btn-skrill w-100">
                            <i class="bi bi-check-circle me-1"></i> Confirm Withdrawal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function copyAccountNumber() {
        const accNum = document.getElementById("accountNumber").innerText;
        const icon = document.getElementById("copyIcon");

        navigator.clipboard.writeText(accNum).then(() => {
            const tooltip = bootstrap.Tooltip.getInstance(icon);
            tooltip.setContent({ '.tooltip-inner': 'Copied!' });
            icon.classList.replace("bi-copy", "bi-check2");

            setTimeout(() => {
                tooltip.setContent({ '.tooltip-inner': 'Copy to clipboard' });
                icon.classList.replace("bi-check2", "bi-copy");
            }, 2000);
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
