@extends('layouts.dashboard')

@section('title', 'Overview')

@section('content')
<h5 class="mb-4">Overview</h5>

@if(Auth::user()->kyc_status == '0')
<div class="text-end mb-3">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kycModal">Open KYC Verification</button>
</div>
@endif

<!-- KYC Modal -->
<div class="modal fade" id="kycModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">KYC Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upload.kyc') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Driver's License</label>
                        <input type="file" class="form-control" name="driver_license">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Passport</label>
                        <input type="file" class="form-control" name="pass">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Residence ID Card</label>
                        <input type="file" class="form-control" name="card">
                    </div>
                    <button type="submit" class="btn btn-accent w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Total Balance Card -->
<div class="db-card mb-3 link-card-dark-blue">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <p class="mb-1">TOTAL BALANCE</p>
            <h5 class="fw-bold mb-0" id="visibleBalance">{{ Auth::user()->currency }}{{ number_format($balance, 2) }}</h5>
            <h5 class="fw-bold mb-0 d-none" id="hiddenBalance">********</h5>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="balanceToggle">
        </div>
    </div>
</div>

<!-- Account Info -->
<h6 class="mb-2"><span class="text-primary">{{ Auth::user()->a_number }} - ACTIVE</span></h6>
<hr>

<div class="db-card mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5><span class="text-black">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></h5>
            <h5 class="fw-bold">
                <span id="visibleBalance2">{{ Auth::user()->currency }}{{ number_format($balance, 2) }}</span>
                <span id="hiddenBalance2" class="d-none">{{ str_repeat('*', strlen(number_format($balance, 2))) }}</span>
            </h5>
        </div>
        <div class="form-check form-switch d-flex align-items-center">
            <input class="form-check-input m-0 me-2" type="checkbox" id="balanceToggle2">
            <label class="form-check-label mb-0" for="balanceToggle2">Hide Balance</label>
        </div>
    </div>
</div>

<!-- Ledger Balance -->
<div class="db-card mb-3 link-card-dark-blue">
    <div class="d-flex justify-content-between align-items-center">
        <span>Ledger balance: {{ Auth::user()->currency }}{{ number_format($balance, 2) }}</span>
        <a href="{{ url('transactions') }}" class="text-white"><i class="bi bi-clock-history"></i> History</a>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-3 mb-4 text-center">
    <div class="col">
        <a href="{{ route('bank') }}" class="text-decoration-none text-dark">
            <div class="db-card p-3">&#128179;<br><small>Bank Transfer</small></div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('cryptopage') }}" class="text-decoration-none text-dark">
            <div class="db-card p-3"><img src="{{ asset('bitcoin.png') }}" alt="Crypto" class="icon-sm"><br><small>Crypto</small></div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('paypal') }}" class="text-decoration-none text-dark">
            <div class="db-card p-3"><img src="{{ asset('paypal.png') }}" alt="Paypal" class="icon-sm"><br><small>Paypal</small></div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('deposit') }}" class="text-decoration-none text-dark">
            <div class="db-card p-3">&#10003;<br><small>Check Deposit</small></div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('loan') }}" class="text-decoration-none text-dark">
            <div class="db-card p-3"><img src="{{ asset('loan.png') }}" alt="Loan" class="icon-sm"><br><small>Loan</small></div>
        </a>
    </div>
</div>

<!-- Ad Carousel -->
<div class="db-card mb-3 p-0 overflow-hidden">
    <div id="bankCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('bank-advert1.jpg') }}" class="d-block w-100" alt="Bank Advert 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('bank-advert2.jpg') }}" class="d-block w-100" alt="Bank Advert 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('bank-advert3.jpg') }}" class="d-block w-100" alt="Bank Advert 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bankCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bankCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const balanceToggle = document.getElementById('balanceToggle');
        const visibleBalance = document.getElementById('visibleBalance');
        const hiddenBalance = document.getElementById('hiddenBalance');

        balanceToggle.addEventListener('change', function () {
            if (this.checked) {
                visibleBalance.classList.add('d-none');
                hiddenBalance.classList.remove('d-none');
            } else {
                visibleBalance.classList.remove('d-none');
                hiddenBalance.classList.add('d-none');
            }
        });

        const balanceToggle2 = document.getElementById('balanceToggle2');
        const visibleBalance2 = document.getElementById('visibleBalance2');
        const hiddenBalance2 = document.getElementById('hiddenBalance2');

        balanceToggle2.addEventListener('change', function () {
            if (this.checked) {
                visibleBalance2.classList.add('d-none');
                hiddenBalance2.classList.remove('d-none');
            } else {
                visibleBalance2.classList.remove('d-none');
                hiddenBalance2.classList.add('d-none');
            }
        });
    });
</script>
@endpush