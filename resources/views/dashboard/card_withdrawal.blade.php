@extends('layouts.dashboard')

@section('title', 'Card Withdrawal')

@section('content')
<h5 class="mb-3 fw-semibold">Virtual Card</h5>

@forelse($details as $detail)
    @if($detail->status == 0)
        <div class="db-card mb-3 text-center link-card-dark-blue">
            <h5>Card on Review</h5>
            <p>This card is currently under review and cannot be displayed.</p>
        </div>
    @else
        <div class="db-card mb-3 link-card-dark-blue">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="badge bg-light text-dark">Virtual Card</span>
            </div>
            <h4 class="fw-bold">{{Auth::user()->currency}}{{number_format($balance, 2, '.', ',')}}</h4>
            <div class="mb-2">
                <span class="small opacity-75">Card Number</span><br>
                <span class="fw-semibold fs-5">{{ implode(' ', str_split($detail->card_number, 4)) }}</span>
            </div>
            <div class="d-flex gap-4">
                <div>
                    <span class="small opacity-75">Expiry</span><br>
                    <span class="fw-semibold">{{$detail->card_expiry}}</span>
                </div>
                <div>
                    <span class="small opacity-75">CCV</span><br>
                    <span class="fw-semibold">{{ $detail->card_cvc }}</span>
                </div>
            </div>
        </div>
    @endif
@empty
    <div class="db-card mb-3 text-center">
        <p class="mb-0">No Card Purchased Yet!</p>
    </div>
@endforelse

<div class="text-center mb-4">
    <a href="{{route('card_withdrawal')}}" class="btn btn-outline-dark">Card Withdrawal</a>
</div>

<!-- Withdrawal Form -->
<div class="db-card">
    <h5 class="mb-3">Card Withdrawal</h5>
    <div class="alert alert-warning">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        You're about to transfer from your account's available balance. This action cannot be reversed. Be sure to enter correct details of your card number, ccv, date.
    </div>

    <form action="{{route('card.transfer')}}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Card Number</label>
            <input type="number" name="card_number" class="form-control" placeholder="Enter Card Number" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CCV</label>
            <input type="number" name="cvv" class="form-control" placeholder="Enter CCV" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Account Number</label>
            <input type="number" name="caccount_number" class="form-control" placeholder="Enter Account Number" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Account Name</label>
            <input type="text" name="caccount_name" class="form-control" placeholder="Enter Account Name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bank Name</label>
            <input type="text" name="cbank_name" class="form-control" placeholder="Enter Bank Name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Transaction Pin</label>
            <input type="number" name="transaction_pin" class="form-control" maxlength="4" placeholder="Enter Transaction Pin" required>
        </div>

        <button type="submit" class="btn btn-accent w-100">Proceed</button>
    </form>
</div>
@endsection
