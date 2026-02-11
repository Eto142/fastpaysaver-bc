@extends('layouts.dashboard')

@section('title', 'Profile')
@section('page-title', 'My Profile')

@section('content')

{{-- Profile header --}}
<div class="db-card mb-4">
    <div class="db-card-body text-center py-4">
        @if(Auth::user()->display_picture)
            <img src="{{ asset('uploads/display/' . Auth::user()->display_picture) }}" class="profile-avatar-lg mb-3" alt="Avatar">
        @else
            <div class="profile-avatar-lg initial mx-auto mb-3">{{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}</div>
        @endif
        <h5 class="fw-700 mb-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
        <span class="text-muted small">{{ Auth::user()->account_type }} &middot; {{ Auth::user()->a_number }}</span>
    </div>
</div>

{{-- Tabs --}}
<div class="db-card">
    <ul class="nav nav-tabs px-3 pt-2" id="profileTab" role="tablist">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#account" type="button">Account</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#security" type="button">Security</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#settings" type="button">Settings</button></li>
    </ul>

    <div class="tab-content db-card-body">
        {{-- Account --}}
        <div class="tab-pane fade show active" id="account">
            <h6 class="fw-600 mb-3">Personal Information</h6>
            <div class="profile-item"><span class="profile-item-label">Full Name</span><span class="profile-item-value">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></div>
            <div class="profile-item"><span class="profile-item-label">Email</span><span class="profile-item-value">{{ Auth::user()->email }}</span></div>
            <div class="profile-item"><span class="profile-item-label">Phone</span><span class="profile-item-value">{{ Auth::user()->phone_number }}</span></div>
            <div class="profile-item"><span class="profile-item-label">Gender</span><span class="profile-item-value">{{ ucfirst(Auth::user()->gender ?? 'Not set') }}</span></div>
            <div class="profile-item"><span class="profile-item-label">Date of Birth</span><span class="profile-item-value">{{ Auth::user()->dob }}</span></div>
            <div class="profile-item"><span class="profile-item-label">Address</span><span class="profile-item-value">{{ Auth::user()->address }}</span></div>

            <h6 class="fw-600 mt-4 mb-3">Account Details</h6>
            <div class="profile-item"><span class="profile-item-label">Account Number</span><span class="profile-item-value">{{ Auth::user()->a_number }}</span></div>
            <div class="profile-item"><span class="profile-item-label">Account Type</span><span class="profile-item-value">{{ Auth::user()->account_type }}</span></div>
            <div class="profile-item"><span class="profile-item-label">Nationality</span><span class="profile-item-value">{{ Auth::user()->country }}</span></div>

            <button class="btn btn-outline-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#kycModal">
                <i class="bi bi-shield-check me-1"></i> Complete KYC Verification
            </button>
        </div>

        {{-- Security --}}
        <div class="tab-pane fade" id="security">
            <h6 class="fw-600 mb-3">Authentication</h6>
            <div class="profile-item"><span class="profile-item-label">Confirmation Method</span><span class="profile-item-value">Transaction PIN</span></div>
            <div class="profile-item profile-item-link" data-bs-toggle="modal" data-bs-target="#changePinModal" style="cursor:pointer;"><span class="profile-item-label">Change Transaction PIN</span><span class="profile-item-value"><i class="bi bi-chevron-right"></i></span></div>
            <div class="profile-item profile-item-link" data-bs-toggle="modal" data-bs-target="#changePasswordModal" style="cursor:pointer;"><span class="profile-item-label">Change Password</span><span class="profile-item-value"><i class="bi bi-chevron-right"></i></span></div>
            <div class="profile-item"><span class="profile-item-label">Reset Secret Question</span><span class="profile-item-value"><i class="bi bi-chevron-right"></i></span></div>

            <h6 class="fw-600 mt-4 mb-3">Profile Management</h6>
            <div class="profile-item profile-item-link" data-bs-toggle="modal" data-bs-target="#updateProfileModal" style="cursor:pointer;"><span class="profile-item-label">Update Profile Details</span><span class="profile-item-value"><i class="bi bi-chevron-right"></i></span></div>
        </div>

        {{-- Settings --}}
        <div class="tab-pane fade" id="settings">
            <h6 class="fw-600 mb-3">Profile Picture</h6>
            <form action="{{ route('personal.dp') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="mb-3">
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                    <div class="form-text">Max file size 5 MB</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Picture</button>
            </form>

            <h6 class="fw-600 mb-3">Personal Details</h6>
            <form action="{{ route('personal.details') }}" method="POST" class="mb-4">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label small">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ Auth::user()->first_name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label small">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="">Select Gender</option>
                            <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ Auth::user()->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" value="{{ Auth::user()->dob }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label small">Address</label>
                    <textarea name="user_address" class="form-control">{{ Auth::user()->address }}</textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label small">Phone</label>
                        <input type="text" name="user_phone" class="form-control" value="{{ Auth::user()->phone_number }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small">Country</label>
                        <input type="text" name="country" class="form-control" value="{{ Auth::user()->country }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
            </form>
        </div>
    </div>
</div>

{{-- KYC Modal --}}
<div class="modal fade modal-clean" id="kycModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-600">KYC Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upload.kyc') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small">Driver's License</label>
                        <input type="file" class="form-control" name="driver_license" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Passport</label>
                        <input type="file" class="form-control" name="pass" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Residence ID Card</label>
                        <input type="file" class="form-control" name="card" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit Documents</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Change Transaction PIN Modal --}}
<div class="modal fade modal-clean" id="changePinModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-600"><i class="bi bi-shield-lock me-2"></i>Change Transaction PIN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info-soft small mb-3">
                    <i class="bi bi-info-circle me-1"></i> Your PIN is used to authorize transactions. Keep it secure and don't share it with anyone.
                </div>
                <form action="{{ route('update-pin') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small">Current PIN</label>
                        <input type="password" name="current_pin" class="form-control" maxlength="4" pattern="\d{4}" placeholder="Enter current 4-digit PIN" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">New PIN</label>
                        <input type="password" name="new_pin" class="form-control" maxlength="4" pattern="\d{4}" placeholder="Enter new 4-digit PIN" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Confirm New PIN</label>
                        <input type="password" name="new_pin_confirmation" class="form-control" maxlength="4" pattern="\d{4}" placeholder="Confirm new PIN" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update PIN</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Change Password Modal --}}
<div class="modal fade modal-clean" id="changePasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-600"><i class="bi bi-key me-2"></i>Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info-soft small mb-3">
                    <i class="bi bi-info-circle me-1"></i> Choose a strong password with at least 8 characters including letters, numbers, and symbols.
                </div>
                <form action="{{ route('update-password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small">Current Password</label>
                        <input type="password" name="old_password" class="form-control" placeholder="Enter current password" required>
                        @error('old_password') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">New Password</label>
                        <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
                        @error('new_password') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm new password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Update Profile Modal --}}
<div class="modal fade modal-clean" id="updateProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-600"><i class="bi bi-person-gear me-2"></i>Update Profile Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('personal.details') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label small">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ Auth::user()->first_name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label small">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ Auth::user()->gender == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="{{ Auth::user()->dob }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Address</label>
                        <textarea name="user_address" class="form-control" rows="2" required>{{ Auth::user()->address }}</textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label small">Phone</label>
                            <input type="text" name="user_phone" class="form-control" value="{{ Auth::user()->phone_number }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ Auth::user()->country }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Profile Picture (optional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text">Leave empty to keep current picture. Max 2MB.</div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection