@extends('layouts.dashboard')

@section('title', 'Crypto Payment')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card text-center">
            <img src="{{ asset('logo.png') }}" alt="Logo" style="width: 120px;" class="mb-3">
            <h5>{{ $item }} Payment</h5>
            <p class="text-muted">Send {{ $amount }} worth {{ $item }} to the wallet address below or scan the QR code with your wallet app.</p>

            <div class="bg-light rounded p-3 mb-3">
                @if($item == 'Bitcoin')
                    @foreach($payment as $payments)
                        <input type="text" id="walletAddress" class="form-control mb-3 text-center" value="{{ $payments->btc_address }}" readonly>
                        <img src="{{ asset('admin/uploads/admin/' . $payments->btcImage) }}" class="img-fluid qr-img" alt="QR Code">
                    @endforeach
                @elseif($item == 'Usdt')
                    @foreach($payment as $payments)
                        <input type="text" id="walletAddress" class="form-control mb-3 text-center" value="{{ $payments->usdt_address }}" readonly>
                        <img src="{{ asset('admin/uploads/admin/' . $payments->usdtImage) }}" class="img-fluid qr-img" alt="QR Code">
                    @endforeach
                @elseif($item == 'Ethereum')
                    @foreach($payment as $payments)
                        <input type="text" id="walletAddress" class="form-control mb-3 text-center" value="{{ $payments->eth_address }}" readonly>
                        <img src="{{ asset('admin/uploads/admin/' . $payments->ethImage) }}" class="img-fluid qr-img" alt="QR Code">
                    @endforeach
                @endif
            </div>

            <button type="button" onclick="copyAddress()" class="btn btn-accent">
                <i class="bi bi-clipboard me-1"></i> Copy Address
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function copyAddress() {
        const input = document.getElementById('walletAddress');
        input.select();
        input.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(input.value);
    }
</script>
@endpush