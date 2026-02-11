@include('admin.header')
@include('admin.navbar')
<!-- Sidebar wrapper end -->
<div class="container-fluid py-4">
 <!-- Dashboard Header - Pure Bootstrap -->
<div class="container-fluid py-3 mb-4 border-bottom">
  <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">
    <!-- Title Section -->
    <div class="d-flex flex-column">
      <h1 class="h2 mb-0 d-flex align-items-center">
        <i class="bi bi-speedometer2 fs-3 text-primary me-2"></i>
        Admin Dashboard
      </h1>
      <p class="text-muted mb-0 mt-1 small">
        Overview and user management
      </p>
    </div>
    
    <!-- Action Button -->
    <div class="d-flex flex-shrink-0">
      <a href="{{ route('admin.manage.users') }}" class="btn btn-primary">
        <i class="bi bi-people-fill me-1"></i>
        <span class="d-none d-sm-inline">Manage</span> Users
      </a>
    </div>
  </div>
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

  <!-- Summary Cards - Properly arranged in 3 columns on laptop, stacked on mobile -->
  <div class="row g-3 mb-4">
    <!-- Card 1 -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-muted mb-2">Total Users</h6>
              <h3 class="mb-0">{{ number_format($totalUsers) }}</h3>
              <div class="mt-2">
              </div>
            </div>
            <div class="bg-primary bg-opacity-10 p-3 rounded">
              <i class="bi bi-people-fill text-primary fs-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-muted mb-2">Total Deposits</h6>
              <h3 class="mb-0">{{ number_format($totalDeposits) }}</h3>
              <div class="mt-2">
              </div>
            </div>
            <div class="bg-success bg-opacity-10 p-3 rounded">
              <i class="bi bi-cash-stack text-success fs-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-muted mb-2">Total Loans</h6>
              <h3 class="mb-0">{{ number_format($totalLoans) }}</h3>
              <div class="mt-2">
              </div>
            </div>
            <div class="bg-info bg-opacity-10 p-3 rounded">
              <i class="bi bi-bank text-info fs-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-muted mb-2">Total Transactions</h6>
              <h3 class="mb-0">{{ number_format($totalTransactions) }}</h3>
              <div class="mt-2">
              </div>
            </div>
            <div class="bg-warning bg-opacity-10 p-3 rounded">
              <i class="bi bi-arrow-left-right text-warning fs-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-muted mb-2">Total Investments</h6>
              <h3 class="mb-0">{{ number_format($totalTrades) }}</h3>
              <div class="mt-2">
              </div>
            </div>
            <div class="bg-purple bg-opacity-10 p-3 rounded">
              <i class="bi bi-graph-up text-purple fs-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 6 -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-muted mb-2">Total Cards</h6>
              <h3 class="mb-0">{{ number_format($totalCards) }}</h3>
              <div class="mt-2">
              </div>
            </div>
            <div class="bg-dark bg-opacity-10 p-3 rounded">
              <i class="bi bi-credit-card text-dark fs-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- User Management Section -->
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom-0 py-3">
          <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
              <h5 class="mb-1">
                <i class="bi bi-people-fill me-2"></i> User Management
              </h5>
              <p class="text-muted mb-0 small">Manage all registered users</p>
            </div>
        </div>
        
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th class="ps-4">User</th>
                  <th>Registration</th>
                  <th>Status</th>
                  <th>Verification</th>
                  <th class="text-end pe-4">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($result as $user)
                <tr>
                  <td class="ps-4">
                    <div class="d-flex align-items-center">
                      <div class="avatar me-3">
                        <img src="{{ asset('uploads/display/'.($user->display_picture ?? 'avatar.jpg')) }}" class="rounded-circle" width="40" height="40" alt="User">
                      </div>
                      <div>
                        <h6 class="mb-0">{{ $user->first_name }} {{ $user->last_name ?? '' }}</h6>
                        <small class="text-muted">{{ $user->email }}</small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-column">
                      <span>{{ \Carbon\Carbon::parse($user->created_at)->format('M j, Y') }}</span>
                      <small class="text-muted">{{ \Carbon\Carbon::parse($user->created_at)->format('g:i A') }}</small>
                    </div>
                  </td>
                  <td>
                    @if($user->user_status == 1)
                    <span class="badge bg-success bg-opacity-10 text-success">
                      <i class="bi bi-check-circle me-1"></i> Active
                    </span>
                    @else
                    <span class="badge bg-danger bg-opacity-10 text-danger">
                      <i class="bi bi-x-circle me-1"></i> Inactive
                    </span>
                    @endif
                  </td>
                  <td>
                    @if($user->email_verified_at)
                    <span class="badge bg-primary bg-opacity-10 text-primary">
                      <i class="bi bi-shield-check me-1"></i> Verified
                    </span>
                    @else
                    <span class="badge bg-secondary bg-opacity-10 text-secondary">
                      <i class="bi bi-shield-exclamation me-1"></i> Unverified
                    </span>
                    @endif
                  </td>
                  <td class="text-end pe-4">
                    <div class="d-flex justify-content-end gap-2">
                      <a href="{{ route('admin.profile', $user->id) }}" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 32px; height: 32px;" data-bs-toggle="tooltip" title="View Profile">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{ route('admin.send-user-mail',$user->id) }}" class="btn btn-sm btn-outline-success rounded-circle" style="width: 32px; height: 32px;" data-bs-toggle="tooltip" title="Send Email">
                        <i class="bi bi-envelope"></i>
                      </a>
                      <form action="{{route('admin.delete', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" style="width: 32px; height: 32px;" data-bs-toggle="tooltip" title="Delete User" onclick="return confirm('Are you sure you want to delete this user?')">
                          <i class="bi bi-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        
        <div class="card-footer bg-white border-top-0 py-3">
          <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <div class="text-muted small">
              Showing <span class="fw-bold">{{ $result->firstItem() }}</span> to <span class="fw-bold">{{ $result->lastItem() }}</span> of <span class="fw-bold">{{ $result->total() }}</span> entries
            </div>
            
            @if($result->hasPages())
            <nav aria-label="User pagination">
              <ul class="pagination pagination-sm mb-0">
                @if($result->onFirstPage())
                <li class="page-item disabled">
                  <span class="page-link">Previous</span>
                </li>
                @else
                <li class="page-item">
                  <a class="page-link" href="{{ $result->previousPageUrl() }}">Previous</a>
                </li>
                @endif

                @foreach($result->getUrlRange(1, $result->lastPage()) as $page => $url)
                <li class="page-item {{ $result->currentPage() == $page ? 'active' : '' }}">
                  <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach

                @if($result->hasMorePages())
                <li class="page-item">
                  <a class="page-link" href="{{ $result->nextPageUrl() }}">Next</a>
                </li>
                @else
                <li class="page-item disabled">
                  <span class="page-link">Next</span>
                </li>
                @endif
              </ul>
            </nav>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* Custom purple color */
  .bg-purple {
    background-color: #6f42c1;
  }
  .text-purple {
    color: #6f42c1;
  }
  
  /* Card styling */
  .card {
    border-radius: 0.5rem;
    transition: transform 0.2s ease;
  }
  
  .card:hover {
    transform: translateY(-3px);
  }
  
  /* Avatar styling */
  .avatar {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
  }
  
  .avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  /* Table styling */
  .table td, .table th {
    vertical-align: middle;
    padding: 1rem;
  }
  
  .table thead th {
    border-bottom-width: 1px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
  }
  
  /* Action buttons */
  .btn-circle {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
  }
  
  /* Responsive adjustments */
  @media (max-width: 768px) {
    .table-responsive {
      border: 0;
    }
    
    .table thead {
      display: none;
    }
    
    .table tr {
      display: block;
      margin-bottom: 1rem;
      border: 1px solid #dee2e6;
      border-radius: 0.25rem;
    }
    
    .table td {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.5rem 1rem;
      border-bottom: 1px solid #dee2e6;
    }
    
    .table td::before {
      content: attr(data-label);
      font-weight: bold;
      margin-right: 1rem;
    }
    
    .table td:last-child {
      border-bottom: 0;
    }
    
    .table td .d-flex {
      justify-content: flex-end !important;
      width: 100%;
    }
  }
</style>

<script>
  // Initialize tooltips and add data-labels for responsive table
  document.addEventListener('DOMContentLoaded', function() {
    // Tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Add data-label attributes for responsive table
    const headers = document.querySelectorAll('thead th');
    const rows = document.querySelectorAll('tbody tr');
    
    headers.forEach((header, index) => {
      rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if(cells[index]) {
          cells[index].setAttribute('data-label', header.textContent.trim());
        }
      });
    });
  });
</script>

	@include('admin.footer')