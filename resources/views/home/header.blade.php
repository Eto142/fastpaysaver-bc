<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Fast Pay Saver Banking Corporation — Secure, modern digital banking for personal and business needs.">
<meta name="keywords" content="Bank, Fast Pay Saver Banking Corporation, Internet Banking, Digital Banking, Savings, Loans">
<meta property="og:description" content="Fast Pay Saver Banking Corporation — Banking made simple, secure, and smart.">
<meta property="og:site_name" content="Fast Pay Saver Banking Corporation">
<link rel="canonical" href="/">
<title>Fast Pay Saver Banking Corporation</title>
<link rel="icon" type="image/png" href="storage/app/public/photos/SogsHXqU6Y0ICRb6DyZgVRWFyDOm44mgql9lWKwW.png">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="temp/custom/assets/css/flaticon.css">

<!-- Main Stylesheet -->
<link rel="stylesheet" href="css/modern-homepage.css">
</head>
<body class="bk-body">

<!-- Loader -->
<div class="bk-loader" id="bkLoader"><div class="bk-loader-spinner"></div></div>

<!-- ===== UTILITY TOP BAR ===== -->
<div class="bk-topbar">
  <div class="bk-wrap">
    <div class="bk-topbar-inner">
      <div class="bk-topbar-l">
        {{-- <span><i class="ri-map-pin-2-line"></i> 256 Cowbridge Rd E, Cardiff CF11 9TN</span> --}}
        <span class="bk-topbar-sep"></span>
        {{-- <span><i class="ri-phone-line"></i> +44 770 142 3168</span> --}}
      </div>
      <div class="bk-topbar-r">
        <span><i class="ri-shield-check-line"></i> FDIC Insured</span>
        <span class="bk-topbar-sep"></span>
        <a href="{{ url('faq') }}"><i class="ri-question-line"></i> Help &amp; FAQ</a>
      </div>
    </div>
  </div>
</div>

<!-- ===== MAIN HEADER ===== -->
<header class="bk-header" id="bkHeader">
  <div class="bk-wrap">
    <div class="bk-header-row">
     <a href="/" class="bk-logo">
  <img src="logo1.png" alt="Fast Pay Saver Banking Corporation" style="height:40px; width:auto;">
</a>


      <nav class="bk-nav" id="bkDesktopNav">
        <a href="/" class="active">Home</a>
        <a href="{{ url('personal') }}">Personal</a>
        <a href="{{ url('business') }}">Business</a>
        <a href="{{ url('credit-card') }}">Cards</a>
        <a href="{{ url('loans') }}">Loans</a>
        <a href="{{ url('about') }}">About</a>
        <a href="{{ url('contact') }}">Contact</a>
      </nav>

      <div class="bk-header-actions">
        <a href="{{ route('login') }}" class="bk-btn bk-btn--ghost">Sign In</a>
        <a href="{{ route('register') }}" class="bk-btn bk-btn--fill">Open Account</a>
      </div>

      <button class="bk-burger" id="bkBurger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<!-- ===== MOBILE SLIDE DRAWER ===== -->
<div class="bk-overlay" id="bkOverlay"></div>
<div class="bk-drawer" id="bkDrawer">
  <div class="bk-drawer-head">
    <a href="/"><img src="logo1.png" alt="Fast Pay Saver" class="bk-drawer-logo"></a>
    <button class="bk-drawer-x" id="bkDrawerClose"><i class="ri-close-line"></i></button>
  </div>
  <nav class="bk-drawer-links">
    <a href="/">Home</a>
    <a href="{{ url('personal') }}">Personal Banking</a>
    <a href="{{ url('business') }}">Business Banking</a>
    <a href="{{ url('credit-card') }}">Credit Cards</a>
    <a href="{{ url('loans') }}">Loans</a>
    <a href="{{ url('about') }}">About Us</a>
    <a href="{{ url('contact') }}">Contact Us</a>
    <a href="{{ url('faq') }}">Help &amp; FAQ</a>
  </nav>
  <div class="bk-drawer-cta">
    <a href="{{ route('login') }}" class="bk-btn bk-btn--ghost bk-btn--block">Sign In</a>
    <a href="{{ route('register') }}" class="bk-btn bk-btn--fill bk-btn--block">Open Account</a>
  </div>
  <div class="bk-drawer-info">
    <p><i class="ri-phone-line"></i> +44 770 142 3168</p>
    <p><i class="ri-mail-line"></i> support@fastpaysaverbc.com</p>
  </div>
</div>

<!-- GTranslate Widget -->
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings={default_language:"en",detect_browser_language:true,wrapper_selector:".gtranslate_wrapper",alt_flags:{en:"usa",pt:"brazil",es:"colombia",fr:"quebec"}};</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
<style>.gtranslate_wrapper{position:fixed!important;top:82px!important;right:16px!important;z-index:9999!important}@media(max-width:991px){.gtranslate_wrapper{top:58px!important}}@media(max-width:767px){.gtranslate_wrapper{top:50px!important;right:10px!important}}</style>
