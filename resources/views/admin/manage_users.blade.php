@include('admin.header')
@include('admin.navbar')
<!-- Sidebar wrapper end -->

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

	<!-- Main header starts -->
	<div class="main-header d-flex align-items-center justify-content-between position-relative">
		<div class="d-flex align-items-center justify-content-center">
			<div class="page-icon">
				<i class="bi bi-window-split"></i>
			</div>
			<div class="page-title d-none d-md-block">
				<h5>Data Tables</h5>
			</div>
		</div>
		<!-- Live updates start -->
		<ul class="updates d-flex align-items-end flex-column overflow-hidden" id="updates">
		
		</ul>
		<!-- Live updates end -->
	</div>
	<!-- Main header ends -->

	<!-- Content wrapper start -->
	<div class="content-wrapper">

		<!-- Row start -->
		<div class="row gx-3">
			<div class="col-sm-12 col-12">
				<!-- Card start -->
				<div class="card">
					<div class="card-header">
						<div class="card-title">All Users</div>
					</div>

					@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-2 mx-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-2 mx-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
					<div class="card-body">
						<div class="table-responsive">
							<table id="highlightRowColumn" class="table custom-table">
								<thead>
									<tr>
										<th>Full Name</th>

										<th>Registered Date</th>
										<th>View User</th>
										<th>Send Mail</th>
										<th>Delete User</th>


									</tr>
								</thead>
								<tbody>

									@foreach($result as $transaction)
									<tr>

										<td>{{$transaction->first_name}}</td>


										<td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('D, M j, Y g:i
											A') }}</td>

										<td><a href="{{ route('admin.profile', $transaction->id) }}"><span
													class="badge shade-blue">View User</span></a></td>
										<td><a href="{{route('admin.send-user-mail',$transaction->id)}}"><span
													class="badge shade-green">Send Mail</span></a></td>
										<td> <form action="{{route('admin.delete', $transaction->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" style="width: 32px; height: 32px;" data-bs-toggle="tooltip" title="Delete User" onclick="return confirm('Are you sure you want to delete this user?')">
                          <i class="bi bi-trash"></i>
                        </button>
                      </form></td>

									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Card end -->




				<!-- Card end -->

				<!-- Card end -->
			</div>
		</div>

	</div>
	<!-- Content wrapper scroll end -->



	@include('admin.footer')