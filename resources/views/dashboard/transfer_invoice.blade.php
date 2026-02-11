@extends('layouts.dashboard')

@section('title', 'Invoice')

@section('content')
@foreach($invoice as $invoice)
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="db-card">
            <h5 class="mb-3">Invoice - {{ $invoice->transaction_ref }}</h5>

            <div class="d-flex justify-content-between mb-4">
                <div>
                    <p class="mb-0">{{ Auth::user()->address }}</p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Invoice - {{ $invoice->transaction_ref }}</p>
                    <p class="mb-0 text-muted">{{ \Carbon\Carbon::parse($invoice->created_at)->format('D, M j, Y g:i A') }}</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Transaction Description</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $invoice->transaction_description }}</td>
                            <td>{{ $invoice->transaction_ref }}</td>
                            <td>{{ number_format($invoice->amount, 2, '.', ',') }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('D, M j, Y g:i A') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td><strong>Total {{ Auth::user()->currency }}</strong></td>
                            <td><strong>{{ number_format($invoice->amount, 2, '.', ',') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-3">
                <button onclick="window.print()" class="btn btn-outline-dark">
                    <i class="bi bi-printer me-1"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
