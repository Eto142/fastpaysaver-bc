@extends('layouts.dashboard')

@section('title', 'My Card')
@section('page-title', 'My Cards')

@section('content')

<div class="row g-4">
    {{-- Card Preview --}}
    <div class="col-lg-6">
        @forelse($details as $detail)
            @if($detail->status == 0)
                <div class="virtual-card text-center mb-3">
                    <span class="badge bg-warning bg-opacity-25 text-white mb-2">UNDER REVIEW</span>
                    <p class="mb-1">Your card is currently being reviewed</p>
                    <p class="small opacity-75">We'll notify you when it's ready</p>
                </div>
            @else
                <div class="virtual-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge bg-success bg-opacity-25 text-white">ACTIVE</span>
                        <img src="{{ asset('mastercard.png') }}" alt="Mastercard" style="height:28px" onerror="this.style.display='none'">
                    </div>
                    <div class="card-number">{{ implode(' ', str_split($detail->card_number, 4)) }}</div>
                    <div class="card-row">
                        <div>
                            <div class="small opacity-60">CARD HOLDER</div>
                            <div>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                        </div>
                        <div class="text-center">
                            <div class="small opacity-60">CVV</div>
                            <div id="cvvValue">&bull;&bull;&bull;</div>
                        </div>
                        <div class="text-end">
                            <div class="small opacity-60">EXPIRY</div>
                            <div>{{ \Carbon\Carbon::parse($detail->card_expiry)->format('m/y') }}</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mb-4">
                    <button class="btn btn-primary flex-fill" onclick="toggleCVV()">
                        <i class="bi bi-eye" id="cvvIcon"></i> <span id="cvvBtnText">Show CVV</span>
                    </button>
                    <button class="btn btn-outline-danger flex-fill"><i class="bi bi-trash"></i> Delete</button>
                </div>
            @endif
        @empty
            <div class="db-card text-center py-5 mb-3">
                <i class="bi bi-credit-card text-muted icon-muted-xl"></i>
                <h5 class="mt-3 fw-600">No Card Available</h5>
                <p class="text-muted small">You don't have a card yet</p>
                <a href="{{ route('request.card', Auth::user()->id) }}" class="btn btn-primary mt-2">Request Card</a>
            </div>
        @endforelse

        @if(!$details->isEmpty() && isset($detail) && $detail->status != 0)
            <div class="text-center">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#deliveryModal">
                    <i class="bi bi-truck me-1"></i> Request Card Delivery
                </button>
            </div>
        @endif
    </div>

    {{-- Card Info --}}
    <div class="col-lg-6">
        <div class="db-card mb-4">
            <div class="db-card-header">Card Features</div>
            <div class="db-card-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="stat-icon blue"><i class="bi bi-lightning"></i></div>
                    <div><h6 class="mb-0 fw-600">Instant Access</h6><span class="text-muted small">Apply and activate anytime</span></div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="stat-icon green"><i class="bi bi-shield-check"></i></div>
                    <div><h6 class="mb-0 fw-600">Safety</h6><span class="text-muted small">Physical delivery & no risk of loss</span></div>
                </div>
            </div>
        </div>

        <div class="db-card">
            <div class="db-card-header">Personal Information</div>
            <div class="db-card-body">
                <div class="d-flex justify-content-between py-2 border-bottom"><span class="text-muted small">First Name</span><span class="fw-500">{{ Auth::user()->first_name }}</span></div>
                <div class="d-flex justify-content-between py-2 border-bottom"><span class="text-muted small">Last Name</span><span class="fw-500">{{ Auth::user()->last_name }}</span></div>
                <div class="d-flex justify-content-between py-2 border-bottom"><span class="text-muted small">Date of Birth</span><span class="fw-500">{{ Auth::user()->dob }}</span></div>
                <div class="d-flex justify-content-between py-2"><span class="text-muted small">Gender</span><span class="fw-500">{{ Auth::user()->gender }}</span></div>
            </div>
        </div>
    </div>
</div>

{{-- Delivery Modal --}}
<div class="modal fade modal-clean" id="deliveryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title fw-600">Card Delivery Request</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body">
                <form id="requestForm" action="{{ route('requestcard.delivery') }}" method="POST">
                    @csrf
                    <div class="mb-3"><label class="form-label small">Full Name</label><input type="text" class="form-control" name="fname" required></div>
                    <div class="mb-3"><label class="form-label small">House Address</label><input type="text" class="form-control" name="address" required></div>
                    <div class="mb-3"><label class="form-label small">Phone Number</label><input type="tel" class="form-control" name="phone" required></div>
                    <div class="mb-3"><label class="form-label small">Email Address</label><input type="email" class="form-control" name="emailAddress" required></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="requestForm" class="btn btn-primary">Submit Request</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@foreach($details as $detail)
<script>const actualCVV = "{{ e($detail->card_cvc) }}";</script>
@endforeach
<script>
let isCVVVisible = false;
function toggleCVV() {
    const v = document.getElementById("cvvValue"), i = document.getElementById("cvvIcon"), t = document.getElementById("cvvBtnText");
    isCVVVisible = !isCVVVisible;
    if (isCVVVisible) { v.textContent = actualCVV; i.classList.replace("bi-eye","bi-eye-slash"); t.textContent = "Hide CVV"; }
    else { v.innerHTML = "&bull;&bull;&bull;"; i.classList.replace("bi-eye-slash","bi-eye"); t.textContent = "Show CVV"; }
}
</script>
@endpush