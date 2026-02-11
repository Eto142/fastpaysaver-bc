<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Forgot Password - Fast Pay Saver Banking Corporation</title>
<meta name="description" content="Reset your Fast Pay Saver Banking Corporation account password.">
<link rel="icon" type="image/png" href="{{ asset('storage/app/public/photos/SogsHXqU6Y0ICRb6DyZgVRWFyDOm44mgql9lWKwW.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/modern-homepage.css') }}">
</head>
<body class="bk-body" style="background:var(--off)">

<!-- Auth Layout -->
<div class="bk-auth">

  <!-- Left Branding Panel (desktop) -->
  <div class="bk-auth-brand">
    <div class="bk-auth-shape bk-auth-shape--1"></div>
    <div class="bk-auth-shape bk-auth-shape--2"></div>
    <div class="bk-auth-shape bk-auth-shape--3"></div>
    <div class="bk-auth-brand-inner">
      <a href="/"><img src="{{ asset('logo02.png') }}" alt="Fast Pay Saver Banking Corporation" class="bk-auth-brand-logo"></a>
      <h1>Password Recovery</h1>
      <p>Don't worry — it happens to the best of us. Enter your email to receive a secure password reset link.</p>
      <div class="bk-auth-features">
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-shield-check-line"></i></div>
          <span>Secure Process</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-mail-send-line"></i></div>
          <span>Email Verification</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-time-line"></i></div>
          <span>Quick Recovery</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-lock-password-line"></i></div>
          <span>Strong Encryption</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel — Forgot Password Form -->
  <div class="bk-auth-main">
    <div class="bk-auth-card">

      <!-- Card Header -->
      <div class="bk-auth-card-head">
        <img src="{{ asset('logo1.png') }}" alt="Fast Pay Saver Banking Corporation" class="bk-auth-card-logo">
        <h2>Forgot Your Password?</h2>
        <p>Enter the email address associated with your account. We'll send you a link to reset your password.</p>
      </div>

      <!-- Card Body -->
      <div class="bk-auth-card-body">

        <!-- Success Message -->
        @if (session('status'))
        <div class="bk-alert bk-alert--success"><i class="ri-checkbox-circle-line"></i> {{ session('status') }}</div>
        @endif

        <!-- Errors -->
        @if ($errors->any())
        <div class="bk-alert bk-alert--error"><i class="ri-error-warning-line"></i> {{ $errors->first() }}</div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
          @csrf

          <!-- Email -->
          <div class="bk-auth-group">
            <label for="email">Email Address</label>
            <div class="bk-auth-input-wrap">
              <i class="ri-mail-line bk-auth-input-icon"></i>
              <input type="email" id="email" name="email" class="bk-auth-input" placeholder="name@email.com" required autofocus autocomplete="email" value="{{ old('email') }}">
            </div>
          </div>

          <!-- Submit -->
          <div style="display:flex;flex-direction:column;gap:10px;margin-top:8px">
            <button type="submit" class="bk-auth-btn bk-auth-btn--primary">
              <i class="ri-mail-send-line"></i> Email Password Reset Link
            </button>
            <a href="{{ route('login') }}" class="bk-auth-btn bk-auth-btn--secondary">
              <i class="ri-arrow-left-line"></i> Back to Sign In
            </a>
          </div>
        </form>

        <!-- Footer -->
        <div class="bk-auth-footer">
          Remember your password? <a href="{{ route('login') }}">Sign In</a>
        </div>

      </div>
    </div>
  </div>

</div>

<!-- GTranslate -->
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings={"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
</body>
</html>
