@extends('layouts.dashboard')

@section('title', 'Withdrawal Completed')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="db-card text-center py-5">
      <h4 class="text-success fw-bold mb-3">Withdrawal Completed</h4>
      <svg class="wd-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
        <circle class="wd-checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
        <path class="wd-checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
      </svg>
      <p><strong>Success!</strong></p>
      <p class="text-muted">Redirecting to your transactions shortly.</p>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  setTimeout(function() {
    window.location.href = '{{ route("transactions") }}';
  }, 3000);
</script>
@endpush