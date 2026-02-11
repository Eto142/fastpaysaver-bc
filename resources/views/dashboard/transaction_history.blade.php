@extends('layouts.dashboard')

@section('title', 'Transaction History')

@section('content')
<div class="db-card">
    <h5 class="mb-4">Recent Transaction Activities</h5>

    @forelse($details as $details)
        <div class="txn-item">
            <div class="txn-icon">
                @if($details->transaction_type == 'Debit')
                    <i class="bi bi-arrow-up-right text-danger"></i>
                @else
                    <i class="bi bi-arrow-down-left text-success"></i>
                @endif
            </div>
            <div class="txn-details">
                <strong>{{ $details->transaction_ref }}</strong>
                <small class="text-muted d-block">{{ \Carbon\Carbon::parse($details->transaction_created_at)->format('D, M j, Y g:i A') }}</small>
                <span class="text-primary">{{ $details->transaction_description }}</span>
            </div>
            <div class="txn-amount text-end">
                @if($details->transaction_type == 'Debit')
                    <span class="text-danger fw-bold">-{{ Auth::user()->currency }}{{ $details->transaction_amount }}</span>
                @elseif($details->transaction_type == 'Credit')
                    <span class="text-success fw-bold">+{{ Auth::user()->currency }}{{ $details->transaction_amount }}</span>
                @endif
                <br>
                @if($details->transaction_status == '1')
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-warning text-dark">Pending</span>
                @endif
            </div>
            <div class="ms-3">
                <span class="d-block mb-1">{{ $details->transaction_type }}</span>
                <form action="{{ route('view.invoice', $details->transaction_id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="{{ $details->transaction }}">
                    <a href="{{ route('view.invoice', $details->transaction_id) }}" class="btn btn-sm btn-accent">View Details</a>
                </form>
            </div>
        </div>
    @empty
        <p class="text-muted text-center py-4">No transactions found.</p>
    @endforelse
</div>
@endsection
