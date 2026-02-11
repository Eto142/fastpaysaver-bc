@extends('layouts.dashboard')

@section('title', 'Make Deposit')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card">
            <h5 class="mb-4">Make Deposit</h5>
            <form method="post" action="{{ route('make.deposit') }}">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input class="form-control" name="amount" type="number" placeholder="Amount" maxlength="15" required>
                </div>
                <button type="submit" class="btn btn-accent w-100">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
