<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Verify Email - Fast Pay Saver Banking Corporation</title>
<meta name="description" content="Verify your email address for Fast Pay Saver Banking Corporation.">
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

  <!-- Left Branding Panel -->
  <div class="bk-auth-brand">
    <div class="bk-auth-shape bk-auth-shape--1"></div>
    <div class="bk-auth-shape bk-auth-shape--2"></div>
    <div class="bk-auth-shape bk-auth-shape--3"></div>
    <div class="bk-auth-brand-inner">
      <a href="/"><img src="{{ asset('logo02.png') }}" alt="Fast Pay Saver Banking Corporation" class="bk-auth-brand-logo"></a>
      <h1>Almost There!</h1>
      <p>Just one more step to secure your account. Enter the verification code we sent to your email address.</p>
      <div class="bk-auth-features">
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-mail-check-line"></i></div>
          <span>Email Verified</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-shield-check-line"></i></div>
          <span>Secure Access</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-lock-line"></i></div>
          <span>Data Protected</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-check-double-line"></i></div>
          <span>Instant Activation</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel — Verify Form -->
  <div class="bk-auth-main">
    <div class="bk-auth-card">

      <!-- Card Header -->
      <div class="bk-auth-card-head" style="text-align:center">
        <img src="{{ asset('logo1.png') }}" alt="Fast Pay Saver Banking Corporation" class="bk-auth-card-logo">
        <div class="bk-auth-verify-icon">
          <i class="ri-mail-send-line"></i>
        </div>
        <h2>Verify Your Email</h2>
        <p>Please enter the verification code sent to <span class="bk-auth-verify-email">{{ $email }}</span></p>
      </div>

      <!-- Card Body -->
      <div class="bk-auth-card-body">

        @if(session('error'))
        <div class="bk-alert bk-alert--error"><i class="ri-error-warning-line"></i> {{ session('error') }}</div>
        @endif
        @if(session('message'))
        <div class="bk-alert bk-alert--success"><i class="ri-checkbox-circle-line"></i> {{ session('message') }}</div>
        @endif

        <form action="{{ route('verify.submit') }}" method="POST" id="verifyForm">
          @csrf
          <input type="hidden" name="email" value="{{ $email }}">

          <!-- Verification Code -->
          <div class="bk-auth-group">
            <label for="digit" style="text-align:center;display:block">Verification Code</label>
            <input type="text" id="digit" name="digit" class="bk-auth-code-input" placeholder="Enter code" autocomplete="one-time-code" required>
          </div>

          <!-- Submit -->
          <div style="margin-top:20px">
            <button type="submit" id="confirmBtn" class="bk-auth-btn bk-auth-btn--primary">
              <i class="ri-check-line"></i> Confirm
            </button>
          </div>
        </form>

        <!-- Resend -->
        <div class="bk-auth-footer" style="margin-top:24px">
          <p class="response" style="margin-bottom:8px"></p>
          Didn't receive a code?
          <a href="{{ route('verify.resend', $id) }}" id="resendLink" onclick="resendLoading(this)">
            <i class="ri-mail-send-line"></i> Resend Code
          </a>
        </div>

        <!-- Copyright -->
        <div style="text-align:center;margin-top:20px;font-size:.72rem;color:var(--txt-m)">
          &copy; <script>document.write(new Date().getFullYear())</script> Fast Pay Saver Banking Corporation. All rights reserved.
        </div>

      </div>
    </div>
  </div>

</div>

<!-- Scripts -->
<script>
document.getElementById('verifyForm').addEventListener('submit', function(){
  var btn = document.getElementById('confirmBtn');
  btn.innerHTML='<span style="display:inline-flex;align-items:center;gap:6px">Confirming... <span class="bk-auth-spinner"></span></span>';
  setTimeout(function(){ btn.disabled=true; }, 0);
});
function resendLoading(el){
  var orig=el.innerHTML;
  el.innerHTML='Please wait...';
  setTimeout(function(){el.innerHTML=orig},2000);
}
</script>

<style>
.bk-auth-spinner{width:14px;height:14px;border:2px solid rgba(255,255,255,.3);border-top-color:#fff;border-radius:50%;animation:bkSpin .6s linear infinite;display:inline-block}
@keyframes bkSpin{to{transform:rotate(360deg)}}
</style>

<!-- GTranslate -->
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings={"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
</body>
</html>
