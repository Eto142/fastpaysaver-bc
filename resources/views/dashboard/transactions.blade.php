@extends('layouts.dashboard')

@section('title', 'Transactions')
@section('page-title', 'Transaction History')

@section('content')

<div class="db-card">
    <div class="db-card-header d-flex justify-content-between align-items-center">
        <span>All Transactions</span>
        <span class="text-muted small">{{ Auth::user()->a_number }}</span>
    </div>
    <div class="db-card-body">
        @if($transaction->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-clock-history text-muted icon-muted-xl"></i>
                <h5 class="mt-3 mb-1 fw-600">No transactions yet</h5>
                <p class="text-muted small">Your transaction history will appear here</p>
            </div>
        @else
            @foreach($transaction as $details)
                <div class="txn-item">
                    <div class="txn-icon
                        @if($details->transaction == 'Bank Transfer') bg-primary bg-opacity-10 text-primary
                        @elseif($details->transaction == 'Loan') bg-success bg-opacity-10 text-success
                        @elseif($details->transaction == 'Card') bg-dark bg-opacity-10 text-dark
                        @elseif($details->transaction == 'Crypto Withdrawal') bg-warning bg-opacity-10 text-warning
                        @elseif($details->transaction == 'Paypal Withdrawal') bg-info bg-opacity-10 text-info
                        @else bg-secondary bg-opacity-10 text-secondary
                        @endif">
                        @if($details->transaction == 'Bank Transfer')
                            <i class="bi bi-arrow-up-right"></i>
                        @elseif($details->transaction == 'Loan')
                            <i class="bi bi-arrow-down-left"></i>
                        @elseif($details->transaction == 'Card')
                            <i class="bi bi-credit-card"></i>
                        @elseif($details->transaction == 'Crypto Withdrawal')
                            <i class="bi bi-currency-bitcoin"></i>
                        @elseif($details->transaction == 'Paypal Withdrawal')
                            <i class="bi bi-paypal"></i>
                        @elseif($details->transaction == 'Skrill Withdrawal')
                            <i class="bi bi-wallet2"></i>
                        @else
                            <i class="bi bi-arrow-left-right"></i>
                        @endif
                    </div>
                    <div class="txn-details">
                        <div class="txn-title">{{ Str::limit($details->transaction_description, 35) }}</div>
                        <div class="txn-sub">{{ $details->transaction }} &middot; {{ $details->created_at->format('M d, Y · h:i A') }}</div>
                    </div>
                    <div class="txn-amount">
                        <div class="value
                            @if(in_array($details->transaction, ['Bank Transfer','Paypal Withdrawal','Skrill Withdrawal','Crypto Withdrawal'])) text-danger
                            @elseif($details->transaction == 'Loan') text-success
                            @endif">
                            @if(in_array($details->transaction, ['Bank Transfer','Paypal Withdrawal','Skrill Withdrawal','Crypto Withdrawal']))
                                -{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                            @elseif($details->transaction == 'Loan')
                                +{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                            @endif
                        </div>
                        <div>
                            @if($details->transaction == 'Card' && $details->transaction_status == '1')
                                <span class="badge badge-success">Approved</span>
                            @elseif($details->transaction_status == '1')
                                <span class="badge badge-success">Successful</span>
                            @elseif($details->transaction_status == '0')
                                <span class="badge badge-pending">Pending</span>
                            @else
                                <span class="badge badge-danger">Failed</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection