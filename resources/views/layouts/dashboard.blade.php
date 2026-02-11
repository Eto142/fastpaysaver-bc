<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — {{ config('app.name', 'FastPay Saver') }}</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- Dashboard CSS --}}
    <link href="{{ asset('assets/css/bank-dashboard.css') }}?v={{ filemtime(public_path('assets/css/bank-dashboard.css')) }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="loading">

{{-- Preloader --}}
<div class="bk-loader" id="bkLoader">
  <div class="bk-loader-content">
    <div class="bk-loader-icon">
      <svg viewBox="0 0 48 48" fill="none"><path class="bk-shield" d="M24 4L6 12v12c0 11.1 7.7 21.5 18 24 10.3-2.5 18-12.9 18-24V12L24 4z" stroke="currentColor" stroke-width="2"/><path class="bk-check" d="M16 24l6 6 10-12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </div>
    <div class="bk-loader-bar"><div class="bk-loader-bar-fill"></div></div>
    <p class="bk-loader-text">Securing your connection<span class="bk-loader-dots"></span></p>
  </div>
</div>

{{-- ===== SIDEBAR ===== --}}
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <img src="{{ asset('logo02.png') }}" alt="Logo" class="sidebar-logo" onerror="this.style.display='none'">
            {{-- <span class="sidebar-brand-text">FastPay Saver</span> --}}
        </a>
        <button class="sidebar-close d-lg-none" id="sidebarClose">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="sidebar-body">
        <ul class="sidebar-nav">
            <li class="sidebar-nav-label">MAIN</li>

            <li class="sidebar-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a>
            </li>

            <li class="sidebar-nav-label">BANKING</li>

            <li class="sidebar-nav-item {{ request()->routeIs('bank*') ? 'active' : '' }}">
                <a href="{{ route('bank') }}"><i class="bi bi-bank2"></i><span>Transfers</span></a>
            </li>
            <li class="sidebar-nav-item {{ request()->routeIs('deposit') ? 'active' : '' }}">
                <a href="{{ route('deposit') }}"><i class="bi bi-wallet2"></i><span>Deposits</span></a>
            </li>
            <li class="sidebar-nav-item {{ request()->routeIs('card*') ? 'active' : '' }}">
                <a href="{{ route('card') }}"><i class="bi bi-credit-card-2-front"></i><span>My Cards</span></a>
            </li>
            <li class="sidebar-nav-item {{ request()->routeIs('loan*') ? 'active' : '' }}">
                <a href="{{ route('loan') }}"><i class="bi bi-cash-stack"></i><span>Loans</span></a>
            </li>
            {{-- <li class="sidebar-nav-item {{ request()->routeIs('paybills') ? 'active' : '' }}">
                <a href="{{ route('paybills') }}"><i class="bi bi-receipt"></i><span>Pay Bills</span></a>
            </li> --}}

            <li class="sidebar-nav-label">INVESTMENTS</li>

            <li class="sidebar-nav-item {{ request()->routeIs('cryptopage') ? 'active' : '' }}">
                <a href="{{ route('cryptopage') }}"><i class="bi bi-currency-bitcoin"></i><span>Crypto</span></a>
            </li>
            {{-- <li class="sidebar-nav-item {{ request()->routeIs('cfx') ? 'active' : '' }}">
                <a href="{{ route('cfx') }}"><i class="bi bi-currency-exchange"></i><span>Forex</span></a>
            </li> --}}

            <li class="sidebar-nav-label">HISTORY</li>

            <li class="sidebar-nav-item {{ request()->routeIs('transactions') ? 'active' : '' }}">
                <a href="{{ route('transactions') }}"><i class="bi bi-clock-history"></i><span>Transactions</span></a>
            </li>
            {{-- <li class="sidebar-nav-item {{ request()->routeIs('bankstatement') ? 'active' : '' }}">
                <a href="{{ route('bankstatement') }}"><i class="bi bi-file-earmark-text"></i><span>Bank Statement</span></a>
            </li> --}}

            <li class="sidebar-nav-label">ACCOUNT</li>

            <li class="sidebar-nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
                <a href="{{ route('profile') }}"><i class="bi bi-person"></i><span>Profile</span></a>
            </li>
            <li class="sidebar-nav-item {{ request()->routeIs('settings') ? 'active' : '' }}">
                <a href="{{ route('settings') }}"><i class="bi bi-gear"></i><span>Settings</span></a>
            </li>
            <li class="sidebar-nav-item">
                <form method="POST" action="{{ route('logout') }}" id="sidebar-logout-form">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
                        <i class="bi bi-box-arrow-left"></i><span>Logout</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</aside>
{{-- ===== END SIDEBAR ===== --}}


{{-- ===== OVERLAY (mobile) ===== --}}
<div class="sidebar-overlay" id="sidebarOverlay"></div>


{{-- ===== MAIN WRAPPER ===== --}}
<div class="main-wrapper" id="mainWrapper">

    {{-- Top Navbar --}}
    <header class="topbar">
        <div class="topbar-left">
            <button class="hamburger-btn" id="hamburgerBtn">
                <i class="bi bi-list"></i>
            </button>
            <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
        </div>
        <div class="topbar-right">
            {{-- Account number --}}
            <div class="topbar-account d-none d-md-flex">
                <span class="text-muted small">A/C:</span>
                <span class="fw-medium small ms-1" id="accountNumber">{{ Auth::user()->a_number }}</span>
                <i class="bi bi-copy ms-1 text-muted copy-btn" onclick="copyAccountNumber()" title="Copy"></i>
            </div>

            {{-- Notifications placeholder --}}
            {{-- <div class="topbar-icon" title="Notifications">
                <i class="bi bi-bell"></i>
            </div> --}}

            {{-- Profile dropdown --}}
            <div class="dropdown">
                <button class="topbar-profile dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(Auth::user()->display_picture)
                        <img src="{{ asset('uploads/display/' . Auth::user()->display_picture) }}" alt="Avatar" class="avatar">
                    @else
                        <div class="avatar avatar-initial">{{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}</div>
                    @endif
                    <span class="d-none d-md-inline ms-2">{{ Auth::user()->first_name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="bi bi-person me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('settings') }}"><i class="bi bi-gear me-2"></i>Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-left me-2"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    {{-- Alerts --}}
    <div class="content-wrapper">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="dashboard-footer">
        <span>&copy; {{ date('Y') }} {{ config('app.name', 'FastPay Saver') }}. All rights reserved.</span>
    </footer>

    {{-- Bottom Nav (mobile) --}}
    <nav class="bottom-nav" id="bottomNav">
        <a href="{{ route('dashboard') }}" class="bottom-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Home</span>
        </a>
        <a href="{{ route('bank') }}" class="bottom-nav-item {{ request()->routeIs('bank*') ? 'active' : '' }}">
            <i class="bi bi-send-fill"></i>
            <span>Transfer</span>
        </a>
        <a href="{{ route('deposit') }}" class="bottom-nav-item bottom-nav-center {{ request()->routeIs('deposit') ? 'active' : '' }}">
            <div class="bottom-nav-fab"><i class="bi bi-plus-lg"></i></div>
            <span>Deposit</span>
        </a>
        <a href="{{ route('card') }}" class="bottom-nav-item {{ request()->routeIs('card*') ? 'active' : '' }}">
            <i class="bi bi-credit-card-fill"></i>
            <span>Cards</span>
        </a>
        <a href="{{ route('profile') }}" class="bottom-nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
            <i class="bi bi-person-fill"></i>
            <span>Profile</span>
        </a>
    </nav>

</div>
{{-- ===== END MAIN WRAPPER ===== --}}


{{-- Profile picture upload (hidden) --}}
<form id="uploadForm" action="{{ route('personal.dp') }}" method="POST" enctype="multipart/form-data" class="d-none">
    @csrf
    <input type="file" id="profilePictureInput" name="image" accept="image/*" onchange="this.form.submit()">
</form>

{{-- GTranslate --}}
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings={default_language:"en",detect_browser_language:true,wrapper_selector:".gtranslate_wrapper",alt_flags:{en:"usa",pt:"brazil",es:"colombia",fr:"quebec"}};</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
<style>
/* GTranslate — compact dark pill */
.gtranslate_wrapper{position:fixed!important;bottom:82px!important;right:18px!important;top:auto!important;left:auto!important;z-index:9999!important}
.gtranslate_wrapper .gt_float_switcher{background:var(--primary,#0f2b46)!important;border:none!important;border-radius:40px!important;padding:5px 12px 5px 8px!important;box-shadow:0 4px 16px rgba(15,43,70,.4)!important;transition:all .25s ease!important;font-family:'Inter',sans-serif!important;min-height:0!important}
.gtranslate_wrapper .gt_float_switcher:hover{box-shadow:0 6px 24px rgba(15,43,70,.55)!important;transform:translateY(-1px)!important}
.gtranslate_wrapper .gt_float_switcher .gt-current-lang{color:#fff!important;font-size:.72rem!important;font-weight:600!important;letter-spacing:.3px!important;text-transform:uppercase!important}
.gtranslate_wrapper .gt_float_switcher img.gt-current-lang-image{border-radius:50%!important;box-shadow:0 0 0 1.5px rgba(255,255,255,.2)!important;width:18px!important;height:18px!important}
.gtranslate_wrapper .gt_float_switcher .gt-selected .gt-lang-code{color:#fff!important}
.gtranslate_wrapper .gt_float_switcher .gt_options{background:var(--primary,#0f2b46)!important;border:none!important;border-radius:10px!important;box-shadow:0 8px 32px rgba(0,0,0,.4)!important;padding:4px!important;margin-bottom:6px!important;max-height:200px!important;overflow-y:auto!important}
.gtranslate_wrapper .gt_float_switcher .gt_options a{color:rgba(255,255,255,.75)!important;font-size:.72rem!important;font-weight:500!important;padding:6px 10px!important;border-radius:8px!important;transition:background .15s ease!important;display:flex!important;align-items:center!important;gap:6px!important;font-family:'Inter',sans-serif!important;background:transparent!important}
.gtranslate_wrapper .gt_float_switcher .gt_options a:hover{background:rgba(37,99,235,.3)!important;color:#fff!important}
.gtranslate_wrapper .gt_float_switcher .gt_options a img{border-radius:50%!important;width:16px!important;height:16px!important;box-shadow:none!important}
.gtranslate_wrapper .gt_float_switcher .gt_options::-webkit-scrollbar{width:3px}
.gtranslate_wrapper .gt_float_switcher .gt_options::-webkit-scrollbar-track{background:transparent}
.gtranslate_wrapper .gt_float_switcher .gt_options::-webkit-scrollbar-thumb{background:rgba(255,255,255,.12);border-radius:3px}
/* Kill any white boxes GTranslate injects */
.gt_float_switcher *{background-color:transparent!important}
.gt_float_switcher,.gt_float_switcher .gt_options{background:var(--primary,#0f2b46)!important}
@media(max-width:991px){.gtranslate_wrapper{bottom:74px!important;right:14px!important}}
</style>


{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- Dashboard JS --}}
<script>
    // Sidebar toggle
    const sidebar      = document.getElementById('sidebar');
    const overlay      = document.getElementById('sidebarOverlay');
    const hamburger    = document.getElementById('hamburgerBtn');
    const sidebarClose = document.getElementById('sidebarClose');

    function openSidebar()  { sidebar.classList.add('open'); overlay.classList.add('show'); }
    function closeSidebar() { sidebar.classList.remove('open'); overlay.classList.remove('show'); }

    hamburger.addEventListener('click', () => sidebar.classList.contains('open') ? closeSidebar() : openSidebar());
    sidebarClose.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);

    // Desktop collapse toggle
    hamburger.addEventListener('dblclick', () => {
        document.body.classList.toggle('sidebar-collapsed');
    });

    // Copy account number
    function copyAccountNumber() {
        const num = document.getElementById('accountNumber').textContent.trim();
        navigator.clipboard.writeText(num).then(() => {
            const icon = document.querySelector('.copy-btn');
            icon.classList.replace('bi-copy', 'bi-check');
            setTimeout(() => icon.classList.replace('bi-check', 'bi-copy'), 1500);
        });
    }
</script>

@stack('scripts')
<script>
(function(){
    var loader = document.getElementById('bkLoader');
    var body = document.body;
    function hideLoader() {
        if (loader) loader.classList.add('done');
        body.classList.remove('loading');
    }
    if (document.readyState === 'complete') {
        hideLoader();
    } else {
        window.addEventListener('load', hideLoader);
    }
    // Fallback: hide after 4 seconds max
    setTimeout(hideLoader, 4000);
})();
</script>
</body>
</html>
