@extends('layouts.dashboard')

@section('title', 'Upload Loan Documents')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="db-card">
      <div class="text-center mb-4">
        <h4 class="fw-semibold">Upload Loan Documents</h4>
        <p class="text-muted">Complete your loan application by uploading the required documents</p>
      </div>

      <form action="{{route('continue.loan')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="amount" value="{{ $data['amount'] }}">
        <input type="hidden" name="reason" value="{{ $data['reason'] }}">
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

        <!-- Driver's License -->
        <div class="document-upload">
          <div class="mb-3">
            <label class="fw-semibold mb-2">
              <i class="bi bi-card-image upload-icon"></i> Driver's License
            </label>
            <div class="input-group">
              <input type="file" id="license" name="license" class="custom-file-input" accept="image/*" required>
              <label class="custom-file-label w-100" for="license">Choose file</label>
            </div>
            <small class="text-muted">Upload front and back of your driver's license</small>
          </div>
        </div>

        <!-- Photo ID -->
        <div class="document-upload">
          <div class="mb-3">
            <label class="fw-semibold mb-2">
              <i class="bi bi-person-badge upload-icon"></i> Photo ID
            </label>
            <div class="input-group">
              <input type="file" id="photoID" name="photoID" class="custom-file-input" accept="image/*" required>
              <label class="custom-file-label w-100" for="photoID">Choose file</label>
            </div>
            <small class="text-muted">Upload a clear photo of your government-issued ID</small>
          </div>
        </div>

        <!-- Selfie -->
        <div class="document-upload">
          <div class="mb-3">
            <label class="fw-semibold mb-2">
              <i class="bi bi-camera upload-icon"></i> Selfie with ID
            </label>
            <div class="input-group">
              <input type="file" id="selfie" name="selfie" class="custom-file-input" accept="image/*" required>
              <label class="custom-file-label w-100" for="selfie">Choose file</label>
            </div>
            <small class="text-muted">Take a selfie while holding your ID</small>
          </div>
        </div>

        @if (Auth::check() && Auth::user()->country === 'United States')
          <!-- SSN -->
          <div class="document-upload">
            <div class="mb-3">
              <label class="fw-semibold mb-2">
                <i class="bi bi-shield-lock upload-icon"></i> SSN
              </label>
              <input type="text" id="ssn" name="ssn" class="form-control" placeholder="Enter SSN">
            </div>
          </div>

          <!-- Credit Score -->
          <div class="document-upload">
            <div class="mb-3">
              <label class="fw-semibold mb-2">
                <i class="bi bi-graph-up upload-icon"></i> Credit Score
              </label>
              <input type="number" id="credit_score" name="credit_score" class="form-control" placeholder="Enter Credit Score">
            </div>
          </div>
        @endif

        <button type="submit" class="btn btn-accent w-100 mt-3">
          <i class="bi bi-cloud-arrow-up"></i> Submit Documents
        </button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.querySelectorAll('.custom-file-input').forEach(input => {
    input.addEventListener('change', function(e) {
      const fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
      const label = e.target.nextElementSibling;
      label.textContent = fileName;
    });
  });
</script>
@endpush