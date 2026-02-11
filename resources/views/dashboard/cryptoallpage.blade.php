@extends('layouts.dashboard')

@section('title', 'Crypto Transactions')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h5 class="mb-0 fw-semibold">Crypto Transactions</h5>
    </div>
    <div class="text-end">
        <span class="text-muted small d-block">
            <span id="accountNumber">{{ Auth::user()->a_number }}</span>
            <i class="bi bi-copy ms-1 clickable" id="copyIcon" onclick="copyAccountNumber()" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard"></i>
        </span>
    </div>
</div>

<!-- Balance Card -->
<div class="crypto-balance-card">
    <div class="d-flex align-items-center mb-3">
        <i class="bi bi-currency-bitcoin me-3 icon-bitcoin fs-4"></i>
        <div>
            <div class="small">Main Balance</div>
            <div class="crypto-balance-amount">{{Auth::user()->currency}}{{number_format($balance, 2, '.', ',')}}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="crypto-account-detail">ACC TYPE</div>
            <div class="crypto-account-value">{{Auth::user()->account_type}}</div>
        </div>
        <div class="col-6">
            <div class="crypto-account-detail">ACCOUNT OWNER</div>
            <div class="crypto-account-value">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</div>
        </div>
    </div>
</div>

<!-- Crypto Actions -->
<div class="row">
    <div class="col-md-6">
        <a href="{{route('crypto_deposit')}}" class="text-decoration-none">
            <div class="crypto-action-card crypto-deposit">
                <div class="crypto-action-icon">
                    <i class="bi bi-arrow-down-circle"></i>
                </div>
                <h5>Crypto Deposit</h5>
                <p class="small">Add crypto to your account</p>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{route('crypto')}}" class="text-decoration-none">
            <div class="crypto-action-card crypto-withdraw">
                <div class="crypto-action-icon">
                    <i class="bi bi-arrow-up-circle"></i>
                </div>
                <h5>Crypto Withdrawal</h5>
                <p class="small">Send crypto to external wallets</p>
            </div>
        </a>
    </div>
</div>

<!-- Quick Actions -->
<h6 class="mt-4">Quick Actions</h6>
<div class="row">
    <div class="col-md-6">
        <a href="{{route('bank')}}" class="text-decoration-none">
            <div class="quick-action-card">
                <div class="quick-action-icon transfer-icon">
                    <i class="bi bi-arrow-left-right"></i>
                </div>
                <h6>Transfer</h6>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{route('transactions')}}" class="text-decoration-none">
            <div class="quick-action-card">
                <div class="quick-action-icon history-icon">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h6>View Transactions</h6>
            </div>
        </a>
    </div>
</div>

<!-- Crypto Deposit Modal -->
<div class="modal fade" id="cryptoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crypto Deposit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> Copy the address below to deposit crypto
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="walletAddress" value="1FpSrZ5NNLzGeX7384xWmrdqixt1UGPJxd" readonly>
                    <button class="btn btn-outline-secondary" type="button" id="copyAddress">
                        <i class="bi bi-copy"></i>
                    </button>
                </div>
                <a href="https://moonpay.com" class="btn btn-accent w-100">
                    Buy Crypto
                </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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

    document.getElementById('copyAddress').addEventListener('click', function() {
        const walletAddress = document.getElementById('walletAddress');
        walletAddress.select();
        document.execCommand('copy');

        const tooltip = new bootstrap.Tooltip(this, {
            title: 'Copied!',
            trigger: 'manual'
        });
        tooltip.show();

        setTimeout(() => {
            tooltip.hide();
        }, 2000);
    });

    document.addEventListener("DOMContentLoaded", function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush