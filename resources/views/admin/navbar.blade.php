    <!-- Admin Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <!-- Sidebar Brand -->
        <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}" class="brand-logo">
                <i class="bi bi-shield-check"></i>
            </a>
            <div class="brand-text">
                <span class="brand-name">FastPay Saver</span>
                <span class="brand-tagline">Admin Panel</span>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Main Menu</div>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.wallet')}}" class="nav-link {{ request()->routeIs('admin.wallet') ? 'active' : '' }}">
                            <i class="bi bi-wallet2"></i>
                            <span class="nav-text">Update Wallet</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.manage.users')}}" class="nav-link {{ request()->routeIs('admin.manage.users') ? 'active' : '' }}">
                            <i class="bi bi-people-fill"></i>
                            <span class="nav-text">Manage Users</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Financial</div>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li class="nav-item">
                        <a href="{{route('admin.user.loans')}}" class="nav-link {{ request()->routeIs('admin.user.loans') ? 'active' : '' }}">
                            <i class="bi bi-cash-stack"></i>
                            <span class="nav-text">Manage Loans</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.user.cards')}}" class="nav-link {{ request()->routeIs('admin.user.cards') ? 'active' : '' }}">
                            <i class="bi bi-credit-card-2-front-fill"></i>
                            <span class="nav-text">Cards</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.user.transaction')}}" class="nav-link {{ request()->routeIs('admin.user.transaction') ? 'active' : '' }}">
                            <i class="bi bi-arrow-left-right"></i>
                            <span class="nav-text">Transactions</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Settings</div>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li class="nav-item">
                        <a href="{{route('admin.user.mail')}}" class="nav-link {{ request()->routeIs('admin.user.mail') ? 'active' : '' }}">
                            <i class="bi bi-envelope-fill"></i>
                            <span class="nav-text">Send Email</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.change.password')}}" class="nav-link {{ request()->routeIs('admin.change.password') ? 'active' : '' }}">
                            <i class="bi bi-key-fill"></i>
                            <span class="nav-text">Change Password</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://fastpaysaverbc.com/" class="nav-link" target="_blank">
                            <i class="bi bi-globe"></i>
                            <span class="nav-text">Visit Site</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <div class="sidebar-footer-content">
                <div class="admin-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="admin-info">
                    <div class="admin-name">Administrator</div>
                    <div class="admin-role">Super Admin</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <main class="admin-main">
        <div class="admin-content">
            <!-- Alerts -->
            @if (session('error'))
                <div class="admin-alert admin-alert-error">
                    <i class="admin-alert-icon bi bi-exclamation-circle-fill"></i>
                    <div class="admin-alert-content">
                        <div class="admin-alert-title">Error</div>
                        <div class="admin-alert-message">{{ session('error') }}</div>
                    </div>
                </div>
            @elseif (session('status'))
                <div class="admin-alert admin-alert-success">
                    <i class="admin-alert-icon bi bi-check-circle-fill"></i>
                    <div class="admin-alert-content">
                        <div class="admin-alert-title">Success</div>
                        <div class="admin-alert-message">{{ session('status') }}</div>
                    </div>
                </div>
            @elseif (session('message'))
                <div class="admin-alert admin-alert-success">
                    <i class="admin-alert-icon bi bi-check-circle-fill"></i>
                    <div class="admin-alert-content">
                        <div class="admin-alert-title">Success</div>
                        <div class="admin-alert-message">{{ session('message') }}</div>
                    </div>
                </div>
            @endif
