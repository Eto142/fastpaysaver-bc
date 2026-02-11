@extends('layouts.dashboard')

@section('title', 'Card Under Review')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card text-center">
            <div class="review-spinner"></div>
            <p>Card <b class="text-primary">is under review</b></p>
            <p>Please wait.... Redirecting in seconds</p>
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
