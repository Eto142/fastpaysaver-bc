@extends('layouts.dashboard')

@section('title', 'Bank Transfer')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h5 class="mb-0 fw-semibold">Bank Transfer</h5>
  </div>
  <div class="text-end">
    <span class="text-muted small d-block">
      <span id="accountNumber">{{ Auth::user()->a_number }}</span>
      <i class="bi bi-copy ms-1 clickable" id="copyIcon" onclick="copyAccountNumber()" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard"></i>
    </span>
  </div>
</div>

<!-- Balance Display -->
<div class="db-card mb-3">
  <div class="d-flex justify-content-between align-items-center">
    <span class="text-muted">Available Balance</span>
    <span class="fw-semibold">{{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}</span>
  </div>
</div>

<!-- Transfer Form -->
<div class="db-card">
  <div class="alert alert-warning mb-3">
    <i class="bi bi-exclamation-circle-fill me-2"></i>
    You're about to transfer from your account's available balance. Please enter your correct information.
  </div>

  <form action="{{route('bank.transfer')}}" method="POST">
    @csrf
    <input type="hidden" name="email" value="{{ Auth::user()->email}}">
    <!-- Hidden inputs carrying data from Page 1 -->
    @foreach($details as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
    <div class="mb-3">
      <label class="form-label">Amount</label>
      <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Transaction PIN</label>
      <input type="password" name="transaction_pin" class="form-control" placeholder="Enter your 4-digit PIN" maxlength="4" required>
    </div>

    <button type="submit" class="btn btn-accent w-100">Transfer Funds</button>
  </form>
</div>

<!-- OTP Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">OTP Verification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning">
          <i class="bi bi-shield-lock me-2"></i>
          Enter the OTP sent to your registered email
        </div>
        <input type="number" name="otp" class="form-control mb-3" placeholder="Enter OTP">
        <button type="button" class="btn btn-accent w-100">Confirm Transfer</button>
      </div>
    </div>
  </div>
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

    @if(session('show_otp'))
      var otpModal = new bootstrap.Modal(document.getElementById('otpModal'));
      otpModal.show();
    @endif
  });
</script>
@endpush