@extends('layouts.dashboard')

@section('title', 'Bank Statement')

@section('content')
<div class="db-card">
    <div class="text-center mb-4">
        <img src="{{ asset('logo.png') }}" alt="Bank Logo" style="height: 80px;">
        <h2>Bank Statement</h2>
        <p class="text-muted">Issued by FastPay Saver Bank</p>
        <hr>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <button onclick="sendStatement()" class="btn btn-accent">Email Statement</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Amount ({{ Auth::user()->currency }})</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction as $details)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($details->created_at)->toFormattedDateString() }}</td>
                    <td>{{ $details->transaction_description }}</td>
                    <td>{{ $details->transaction }}</td>
                    <td>
                        @if($details->transaction == 'Loan') +
                        @else -
                        @endif
                        {{ number_format($details->transaction_amount, 2, '.', ',') }}
                    </td>
                    <td>
                        @if($details->transaction_status == 1)
                            <span class="badge bg-success">Successful</span>
                        @elseif($details->transaction_status == 0)
                            <span class="badge bg-primary">Pending</span>
                        @else
                            <span class="badge bg-danger">Failed</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function sendStatement() {
        fetch("{{ route('send.bank.statement') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                transactions: @json($transaction)
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
            } else if (data.error) {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
</script>
@endpush
