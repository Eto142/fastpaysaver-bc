@extends('layouts.dashboard')

@section('title', 'Loan Request')

@section('content')
{{-- ── Loan Stats ── --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon accent"><i class="bi bi-cash-stack"></i></div>
            <div class="stat-info">
                <span>Eligible Amount</span>
                <h4>{{ Auth::user()->currency }}{{ number_format(Auth::user()->eligible_loan, 2) }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon yellow"><i class="bi bi-hourglass-split"></i></div>
            <div class="stat-info">
                <span>Outstanding</span>
                <h4>{{ Auth::user()->currency }}{{ number_format($outstanding_loan, 2) }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon orange"><i class="bi bi-clock"></i></div>
            <div class="stat-info">
                <span>Pending</span>
                <h4>{{ Auth::user()->currency }}{{ number_format($pending_loan, 2) }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- ── Loan Application Form ── --}}
    <div class="col-lg-7">
        <div class="db-card">
            <h5 class="fw-semibold mb-3">Apply for a Loan</h5>

            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i>
                You're eligible for up to {{ Auth::user()->currency }}{{ number_format(Auth::user()->eligible_loan, 2) }} based on your account activity.
            </div>

            <form action="{{ route('make.loan') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                <div class="mb-3">
                    <label class="form-label">Loan Amount</label>
                    <div class="input-group">
                        <span class="input-group-text">{{ Auth::user()->currency }}</span>
                        <input type="number" name="amount" class="form-control" placeholder="Enter amount" required min="100" max="{{ Auth::user()->eligible_loan }}" step="100">
                    </div>
                    <small class="text-muted">Minimum: {{ Auth::user()->currency }}100</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Loan Type</label>
                    <select class="form-select" name="loan_type" required>
                        <option value="Personal Loan">Personal Loan</option>
                        <option value="Business Loan">Business Loan</option>
                        <option value="Emergency Loan">Emergency Loan</option>
                        <option value="Education Loan">Education Loan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Repayment Period</label>
                    <select class="form-select" name="repayment_period" required>
                        <option value="30">1 Month</option>
                        <option value="90">3 Months</option>
                        <option value="180" selected>6 Months</option>
                        <option value="365">12 Months</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Purpose</label>
                    <textarea name="reason" class="form-control" rows="3" placeholder="Briefly describe the purpose of this loan" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Transaction PIN</label>
                    <input type="password" name="transaction_pin" class="form-control" placeholder="Enter 4-digit PIN" maxlength="4" required>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="termsCheck" required>
                    <label class="form-check-label small" for="termsCheck">
                        I agree to the loan terms and conditions. I understand that late repayments may incur additional fees.
                    </label>
                </div>

                <button type="submit" class="btn btn-accent w-100 py-2">
                    <i class="bi bi-cash-stack me-1"></i> Request Loan
                </button>
            </form>
        </div>
    </div>

    {{-- ── Recent Loan Transactions ── --}}
    <div class="col-lg-5">
        <div class="db-card">
            <h5 class="fw-semibold mb-3">Loan History</h5>

            @if(count($transaction) > 0)
                @foreach($transaction as $details)
                <div class="txn-item">
                    <div class="txn-icon link-card-accent">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <div class="txn-details">
                        <strong>{{ $details->transaction_ref }}</strong>
                        <span>{{ \Carbon\Carbon::parse($details->transaction_created_at)->format('M d, Y') }}</span>
                    </div>
                    <div class="txn-amount {{ $details->transaction_status == '1' ? 'credit' : '' }}">
                        {{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                        <span class="badge {{ $details->transaction_status == '1' ? 'bg-success' : 'bg-warning text-dark' }} ms-1">
                            {{ $details->transaction_status == '1' ? 'Completed' : 'Pending' }}
                        </span>
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-cash-stack fs-1"></i>
                    <p class="mt-2">No loan transactions yet</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection