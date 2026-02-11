@extends('layouts.dashboard')

@section('title', 'Loan Under Review')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="db-card text-center py-5">
      <div class="loan-spinner"></div>
      <div class="loan-good-sign">
        <svg fill="#28a745" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48px" height="48px">
          <path fill="none" d="M0 0h24v24H0z"/>
          <path d="M9 16.2l-3.5-3.5 1.4-1.4L9 13.4l6.6-6.6 1.4 1.4z"/>
        </svg>
      </div>
      <p class="mb-1">Loan <b class="text-primary">is under review</b></p>
      <p class="text-muted">Please wait.... Redirecting in seconds</p>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  setTimeout(function() {
    document.querySelector('.loan-spinner').style.display = 'none';
    document.querySelector('.loan-good-sign').style.display = 'block';
    setTimeout(function() {
      window.location = '{{ route("dashboard") }}';
    }, 3000);
  }, 3000);
</script>
@endpush