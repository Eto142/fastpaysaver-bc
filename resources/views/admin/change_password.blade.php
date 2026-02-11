
@include('admin.header')
@include('admin.navbar')

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
						<div class="d-flex align-items-center justify-content-center">
							<div class="page-icon">
								<i class="bi bi-columns-gap"></i>
							</div>
							<div class="page-title d-none d-md-block">
								<h5>Change Password</h5>
							</div>
						</div>
						<!-- Live updates start -->
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
<div class="content-wrapper">

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="text-center mb-4">Change Password</h4>

                    {{-- Alert messages --}}
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.update.password') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="oldPasswordInput" class="form-label">Current Password</label>
                            <input type="password" name="old_password" id="oldPasswordInput"
                                class="form-control @error('old_password') is-invalid @enderror"
                                placeholder="Enter current password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="newPasswordInput" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="newPasswordInput"
                                class="form-control @error('new_password') is-invalid @enderror"
                                placeholder="Enter new password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" id="confirmNewPasswordInput"
                                class="form-control" placeholder="Re-enter new password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">
                                Update Password
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Content wrapper end -->


				</div>
				<!-- Content wrapper scroll end -->
@include('admin.footer')