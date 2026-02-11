@extends('layouts.dashboard')

@section('title', 'Settings')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card">
            <h4 class="mb-4">Reset Password</h4>

            <form action="{{ route('update-password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" required>
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-accent w-100">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
