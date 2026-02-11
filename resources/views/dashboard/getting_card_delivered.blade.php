@extends('layouts.dashboard')

@section('title', 'Card Delivery in Progress')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card text-center">
            <div class="delivery-spinner"></div>
            <h5 class="text-success fw-bold">Card Delivery in Progress</h5>
            <p>Please wait....</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    setTimeout(function() {
        window.location = '{{ route("card") }}';
    }, 3000);
</script>
@endpush
