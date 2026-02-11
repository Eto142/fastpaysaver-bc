@extends('layouts.dashboard')

@section('title', 'Pay Bills')

@section('content')
<div class="db-card">
    <h5 class="fw-semibold mb-1">Pay Bills</h5>
    <p class="text-muted mb-4">Select a biller below to proceed</p>

    <div class="row g-3">
        <div class="col-6 col-md-4">
            <div class="bill-tile" onclick="showNotification('Electricity')">
                <div class="bill-icon"><i class="bi bi-lightning-charge"></i></div>
                <div class="bill-label">Electricity</div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="bill-tile" onclick="showNotification('Water')">
                <div class="bill-icon"><i class="bi bi-droplet-half"></i></div>
                <div class="bill-label">Water</div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="bill-tile" onclick="showNotification('Internet')">
                <div class="bill-icon"><i class="bi bi-wifi"></i></div>
                <div class="bill-label">Internet</div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="bill-tile" onclick="showNotification('Mobile Top-Up')">
                <div class="bill-icon"><i class="bi bi-phone"></i></div>
                <div class="bill-label">Mobile Top-Up</div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="bill-tile" onclick="showNotification('Cable TV')">
                <div class="bill-icon"><i class="bi bi-tv"></i></div>
                <div class="bill-label">Cable TV</div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="bill-tile" onclick="showNotification('Gas')">
                <div class="bill-icon"><i class="bi bi-fire"></i></div>
                <div class="bill-label">Gas</div>
            </div>
        </div>
    </div>
</div>

{{-- Notification Modal --}}
<div class="modal fade" id="billModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 rounded-4 text-center p-4">
            <i class="bi bi-envelope-check fs-1 text-primary mb-3"></i>
            <h5>Payment Instruction</h5>
            <p class="text-muted" id="notificationMessage"></p>
            <button class="btn btn-accent w-100" data-bs-dismiss="modal">Got it</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showNotification(billType){
    document.getElementById('notificationMessage').textContent =
        `You will receive ${billType} payment instructions soon. Please check your email or phone for details.`;
    new bootstrap.Modal(document.getElementById('billModal')).show();
}
</script>
@endpush