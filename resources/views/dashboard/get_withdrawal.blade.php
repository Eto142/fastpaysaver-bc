@extends('layouts.dashboard')

@section('title', 'Change Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="db-card">
            <h5 class="mb-4">Reset Login Password</h5>
            <form action="{{ route('update-password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Old Password</label>
                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm New Password">
                </div>
                <button type="submit" class="btn btn-accent w-100">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection