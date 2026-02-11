@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Manage Users</span>
        </nav>
        <h1 class="page-title">Manage Users</h1>
        <p class="page-subtitle">View and manage all registered users</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn-admin btn-admin-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>
    </div>
</div>

<!-- Users Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">
            <i class="bi bi-people-fill"></i>
            All Users
        </h3>
        <span style="color: var(--admin-text-muted); font-size: 14px;">
            {{ count($result) }} users found
        </span>
    </div>
    
    <div class="admin-card-body" style="padding: 0;">
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($result as $transaction)
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar">
                                    <span class="initials">{{ strtoupper(substr($transaction->first_name, 0, 1)) }}{{ strtoupper(substr($transaction->last_name ?? '', 0, 1)) }}</span>
                                </div>
                                <div class="user-info">
                                    <div class="user-name">{{ $transaction->first_name }} {{ $transaction->last_name ?? '' }}</div>
                                    <div class="user-email">{{ $transaction->email ?? 'No email' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M j, Y') }}</div>
                            <small style="color: var(--admin-text-muted);">{{ \Carbon\Carbon::parse($transaction->created_at)->format('g:i A') }}</small>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.profile', $transaction->id) }}" class="action-btn view" title="View Profile">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.send-user-mail', $transaction->id) }}" class="action-btn email" title="Send Email">
                                    <i class="bi bi-envelope"></i>
                                </a>
                                <form action="{{ route('admin.delete', $transaction->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete" title="Delete User" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="empty-state-title">No users found</div>
                                <div class="empty-state-text">There are no registered users yet.</div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.footer')
