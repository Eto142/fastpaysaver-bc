
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
							<li>
								<a href="javascript:void(0)">
									<i class="bi bi-envelope-paper text-red font-1x me-2"></i>
									<span>12 emails from David Michaiah.</span>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
									<i class="bi bi-bar-chart text-blue font-1x me-2"></i>
									<span>15 new features updated successfully.</span>
								</a>
							</li>
							<li>
								<a href="javascript:void(0)">
									<i class="bi bi-folder-check text-yellow font-1x me-2"></i>
									<span>The media folder is created successfully.</span>
								</a>
							</li>
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
				<div class="card-title">Card History</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table custom-table">
    <thead>
        <tr>
            <th>Card Number</th>
            <th>Card CVC</th>
            <th>Card Expiry</th>
            <th>Email</th>
            <th>Date Added</th>
        </tr>
    </thead>
    <tbody>
        @forelse($user_cards as $card)
            <tr>
                <td>**** **** **** {{ substr($card->card_number, -4) }}</td>
                <td>{{ $card->card_cvc }}</td>
                <td>{{ $card->card_expiry }}</td>
                <td>{{ $card->email }}</td>
                <td>{{ \Carbon\Carbon::parse($card->created_at)->format('D, M j, Y g:i A') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">No card history found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

				</div>
			</div>
		</div>
		<!-- Card end -->
	</div>
</div>


						

						
								<!-- Card end -->

								<!-- Card end -->
							</div>
						</div>
				
						</div>
				<!-- Content wrapper scroll end -->

				

				@include('admin.footer')